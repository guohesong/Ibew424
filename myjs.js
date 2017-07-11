 
  var isIE = window.ActiveXObject ? true : false;
  getMouseX = function(inEvent) {

    var x;
    if (isIE) {
      x = (parseInt(event.clientX ) +
        parseInt(document.body.scrollLeft));
    } else {
      x = parseInt(inEvent.pageX);
    }
    return x;

  } // End getMouseX().


  /**
   * Gets the mouse event Y coordinate in a cross-browser fashion.
   *
   * @param inEvent The mouse event object.
   */
  getMouseY = function(inEvent) {

    var y;
    if (isIE) {
      y = (parseInt(event.clientY) + parseInt(document.body.scrollTop));
    } else {
      y = parseInt(inEvent.pageY);
    }
    return y;

  } // End getMouseY().
  
/**
 * Center a given layer on the screen horizontally.
 *
 * @param inObj A reference to the element (presumably a layer) to center.
 */
layerCenterH = function(inObj) {

  var lca;
  var lcb;
  var lcx;
  var iebody;
  var dsocleft;
  if (window.innerWidth) {
    lca = window.innerWidth;
  } else {
    lca = document.body.clientWidth;
  }
  lcb = inObj.offsetWidth;
  lcx = (Math.round(lca / 2)) - (Math.round(lcb / 2));
  iebody = (document.compatMode &&
    document.compatMode != "BackCompat") ?
    document.documentElement : document.body;
  dsocleft = document.all ? iebody.scrollLeft : window.pageXOffset;
  inObj.style.left = lcx + dsocleft + "px";

} // End layerCenterH().


/**
 * Center a given layer on the screen vertically.
 *
 * @param inObj A reference to the element (presumably a layer) to center.
 */
layerCenterV = function(inObj) {

  var lca;
  var lcb;
  var lcy;
  var iebody;
  var dsoctop;
  if (window.innerHeight) {
    lca = window.innerHeight;
  } else {
    lca = document.body.clientHeight;
  }
  lcb = inObj.offsetHeight;
  lcy = (Math.round(lca / 2)) - (Math.round(lcb / 2));
  iebody = (document.compatMode &&
    document.compatMode != "BackCompat") ?
    document.documentElement : document.body;
  dsoctop = document.all ? iebody.scrollTop : window.pageYOffset;
  inObj.style.top = lcy + dsoctop + "px";

} // End layerCenterV().
/**
 * This function is used to execute all the script blocks found in a
 * chunk of text.  This is typically used to execute the scripts found in
 * an AJAX response.
 *
 * @param inText The text to parse scripts from to execute.
 */
execScripts = function (inText) {

  var si = 0;
  while (true) {
    // Finding opening script tag.
    var ss = inText.indexOf("<" + "script" + ">", si);
    if (ss == -1) {
      return;
    }
    // Find closing script tag.
    var se = inText.indexOf("<" + "/" + "script" + ">", ss);
    if (se == -1) {
      return;
    }
    // Jump ahead 9 characters, after the closing script tag.
    si = se + 9;
    // Get the content in between and execute it.
    var sc = inText.substring(ss + 8, se);
    eval(sc);
  }

} // End execScripts().


