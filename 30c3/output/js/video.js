/** Method to check for <video> and specific codec support */
function supportsVideo() {
  var elem = document.createElement('video'),
      bool = false;

  // IE9 Running on Windows Server SKU can cause an exception to be
  // thrown, bug #224
  try {
    if ( bool = !!elem.canPlayType ) {
      bool      = new Boolean(bool);
      bool.ogg  = elem.canPlayType('video/ogg; codecs="theora"');

      // Workaround required for IE9, which doesn't report video
      // support without audio codec specified.
      //   bug 599718 @ msft connect
      var h264 = 'video/mp4; codecs="avc1.42E01E';
      bool.h264 = elem.canPlayType(h264 + '"') || elem.canPlayType(h264 + ', mp4a.40.2"');

      bool.webm = elem.canPlayType('video/webm; codecs="vp8, vorbis"');
    }

  } catch(e) { }

  return bool;
}
