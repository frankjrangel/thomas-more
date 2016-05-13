function initMap() {

    function MarkerLabel_(marker) {
      var me = this;

      this.marker_ = marker;

      this.labelDiv_ = document.createElement("div");
      // Prevent selection of the text in the label:
      this.labelDiv_.onselectstart = function () {
        return false;
      };

      this.containerDiv_ = document.createElement("div");
      this.containerDiv_.appendChild(this.labelDiv_);
      this.containerDiv_.style.cssText = "position: absolute; display: none;";

      this.setMap(this.marker_.getMap());
      google.maps.event.addListener(this.marker_, "map_changed", function () {
        me.setMap(me.marker_.getMap());
      });
    }

    // MarkerLabel_ inherits from <code>OverlayView</code>:
    MarkerLabel_.prototype = new google.maps.OverlayView();

    /**
     * Adds the DIV representing the label to the DOM. It is called
     * automatically when the marker's <code>setMap</code> method is called.
     * @private
     */
    MarkerLabel_.prototype.onAdd = function () {
      var me = this;
      var cMouseIsDown = false;
      var cDraggingInProgress = false;
      var cLastPosition;
      var cLatOffset;
      var cLngOffset;
      var cIgnoreClick;

      this.getPanes().overlayImage.appendChild(this.containerDiv_);

      this.listeners_ = [
        google.maps.event.addDomListener(document, "mouseup", function (mEvent) {
          if (cDraggingInProgress) {
            mEvent.latLng = cLastPosition;
            cIgnoreClick = true; // Set flag to ignore the click event reported after a label drag
            google.maps.event.trigger(me.marker_, "dragend", mEvent);
          }
          google.maps.event.trigger(me.marker_, "mouseup", mEvent);
          cMouseIsDown = false;
          cDraggingInProgress = false;
        }),
        google.maps.event.addListener(me.marker_.getMap(), "mousemove", function (mEvent) {
          if (cMouseIsDown && me.marker_.getDraggable()) {
            // Change the reported location from the mouse position to the marker position:
            mEvent.latLng = new google.maps.LatLng(mEvent.latLng.lat() - cLatOffset, mEvent.latLng.lng() - cLngOffset);
            cLastPosition = mEvent.latLng;
            if (cDraggingInProgress) {
              me.marker_.setPosition(mEvent.latLng);
              google.maps.event.trigger(me.marker_, "drag", mEvent);
            } else {
              // Calculate offsets from the click point to the marker position:
              cLatOffset = mEvent.latLng.lat() - me.marker_.getPosition().lat();
              cLngOffset = mEvent.latLng.lng() - me.marker_.getPosition().lng();
              cDraggingInProgress = true;
              google.maps.event.trigger(me.marker_, "dragstart", mEvent);
            }
          }
        }),
        google.maps.event.addDomListener(this.containerDiv_, "mouseover", function (e) {
          me.containerDiv_.style.cursor = "pointer";
          google.maps.event.trigger(me.marker_, "mouseover", e);
        }),
        google.maps.event.addDomListener(this.containerDiv_, "mouseout", function (e) {
          me.containerDiv_.style.cursor = me.marker_.getCursor();
          google.maps.event.trigger(me.marker_, "mouseout", e);
        }),
        google.maps.event.addDomListener(this.containerDiv_, "click", function (e) {
          if (cIgnoreClick) { // Ignore the click reported when a label drag ends
            cIgnoreClick = false;
          } else {
            google.maps.event.trigger(me.marker_, "click", e);
          }
        }),
        google.maps.event.addDomListener(this.containerDiv_, "dblclick", function (e) {
          google.maps.event.trigger(me.marker_, "dblclick", e);
          // Prevent map zoom when double-clicking on a label:
          e.cancelBubble = true;
          if (e.stopPropagation) {
            e.stopPropagation();
          }
        }),
        google.maps.event.addDomListener(this.containerDiv_, "mousedown", function (e) {
          cMouseIsDown = true;
          cDraggingInProgress = false;
          cLatOffset = 0;
          cLngOffset = 0;
          google.maps.event.trigger(me.marker_, "mousedown", e);
          // Prevent map pan when starting a drag on a label:
          e.cancelBubble = true;
          if (e.stopPropagation) {
            e.stopPropagation();
          }
        }),
        google.maps.event.addListener(this.marker_, "labeltext_changed", function () {
          me.labelDiv_.innerHTML = me.marker_.get("labelText");
        }),
        google.maps.event.addListener(this.marker_, "labelclass_changed", function () {
          me.labelDiv_.className = me.marker_.get("labelClass");
        }),
        google.maps.event.addListener(this.marker_, "labelstyle_changed", function () {
          var i, labelStyle;

          // Apply default style values to the label:
          me.labelDiv_.className = me.marker_.get("labelClass");
          // Apply style values defined in the labelStyle parameter:
          labelStyle = me.marker_.get("labelStyle");
          for (i in labelStyle) {
            if (labelStyle.hasOwnProperty(i)) {
              me.labelDiv_.style[i] = labelStyle[i];
            }
          }
          // Make sure the opacity setting causes the desired effect on MSIE:
          if (typeof me.labelDiv_.style.opacity !== "undefined") {
            me.labelDiv_.style.filter = "alpha(opacity=" + (me.labelDiv_.style.opacity * 100) + ")";
          }
          // Apply mandatory style value:
          me.labelDiv_.style.position = "relative";
        }),
        google.maps.event.addListener(this.marker_, "labelzindex_changed", function () {
          me.containerDiv_.style.zIndex = me.marker_.get("labelZIndex");
        }),
        google.maps.event.addListener(this.marker_, "labelvisible_changed", function () {
          if (me.marker_.get("labelVisible")) {
            me.containerDiv_.style.display = me.marker_.getVisible() ? "block" : "none";
          } else {
            me.containerDiv_.style.display = "none";
          }
        }),
        google.maps.event.addListener(this.marker_, "position_changed", function () {
          var position = me.getProjection().fromLatLngToDivPixel(me.marker_.getPosition());
          me.containerDiv_.style.left = position.x + "px";
          me.containerDiv_.style.top = position.y + "px";
        }),
        google.maps.event.addListener(this.marker_, "visible_changed", function () {
          if (me.marker_.get("labelVisible")) {
            me.containerDiv_.style.display = me.marker_.getVisible() ? "block" : "none";
          } else {
            me.containerDiv_.style.display = "none";
          }
        }),
        google.maps.event.addListener(this.marker_, "title_changed", function () {
          me.containerDiv_.title = me.marker_.getTitle();
        })
      ];
    };

    /**
     * Removes the DIV for the label from the DOM. It also removes all event handlers.
     * This method is called when <code>setMap(null)</code> is called.
     * @private
     */
    MarkerLabel_.prototype.onRemove = function () {
      var i;
      this.containerDiv_.parentNode.removeChild(this.containerDiv_);

      // Remove event listeners:
      for (i = 0; i < this.listeners_.length; i++) {
        google.maps.event.removeListener(this.listeners_[i]);
      }
    };

    /**
     * Draws the label with the specified style and at the specified location.
     * @private
     */
    MarkerLabel_.prototype.draw = function () {
      var i, labelStyle;

      // Position the container:
      var position = this.getProjection().fromLatLngToDivPixel(this.marker_.getPosition());
      this.containerDiv_.style.left = position.x + "px";
      this.containerDiv_.style.top = position.y + "px";

      this.containerDiv_.style.zIndex = this.marker_.get("labelZIndex");

      if (this.marker_.get("labelVisible")) {
        this.containerDiv_.style.display = this.marker_.getVisible() ? "block" : "none";
      } else {
        this.containerDiv_.style.display = "none";
      }

      this.containerDiv_.title = this.marker_.getTitle() || "";

      // Apply default style values to the label:
      this.labelDiv_.className = this.marker_.get("labelClass");
      // Apply style values defined in the labelStyle parameter:
      labelStyle = this.marker_.get("labelStyle");
      for (i in labelStyle) {
        if (labelStyle.hasOwnProperty(i)) {
          this.labelDiv_.style[i] = labelStyle[i];
        }
      }
      // Make sure the opacity setting causes the desired effect on MSIE:
      if (typeof this.labelDiv_.style.opacity !== "undefined") {
        this.labelDiv_.style.filter = "alpha(opacity=" + (this.labelDiv_.style.opacity * 100) + ")";
      }
      // Apply mandatory style value:
      this.labelDiv_.style.position = "relative";

      this.labelDiv_.innerHTML = this.marker_.get("labelText");
    };

    function MarkerWithLabel(opt_options) {
      opt_options.labelText = opt_options.labelText || "";
      opt_options.labelClass = opt_options.labelClass || "markerLabels";
      opt_options.labelStyle = opt_options.labelStyle || {};
      opt_options.labelZIndex = opt_options.labelZIndex || null;
      if (typeof opt_options.labelVisible === "undefined") {
        opt_options.labelVisible = true;
      }

      this.setValues(opt_options);
      this.theLabel_ = new MarkerLabel_(this);
    }

    // MarkerWithLabel inherits from <code>Marker</code>:
    MarkerWithLabel.prototype = new google.maps.Marker();

    var pos = { lat: 10.491560, lng: -66.861905 };

    var map = new google.maps.Map(document.getElementById('mapa'), {
          center: pos,
          zoom: 17,
          scrollwheel: false,
    });

    var marker_labeled = new MarkerWithLabel({
       position: pos,
       draggable: false,
       raiseOnDrag: false,
       map: map,
     });
}
