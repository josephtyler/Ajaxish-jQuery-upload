/**  Ajaxish jQuery upload
 *
 *  This plugin allows you to simulate an ajax file upload. Upon initializing the plugin a hidden iframe
 *  is created next to the initialized element. A source URL for the form should be provided to be loaded
 *  within the frame. Obviously, the form source should contain a form with a file upload field...
 *  Upon clicking the initialized element, the file upload field will be clicked and the user can select
 *  a file. Then the form is immediately submitted. You can do whatever you'd like with the results of the
 *  output. Once the form submits the response is automatically passed into the function specified as
 *  the callback - (opts.callback). Also provided are loadingStart and loadingStop functions.
 */

(function($){

  $.fn.ajaxish = function(options){

    var opts = $.extend({}, defaults, options);
    var $this = this;
    // Create hidden iframe
    var frame = $("<iframe />");
    frame.addClass("ajax-image-frame");
    frame.attr('src',opts.formSrc);
    frame.hide();

    // Insert the frame after the button
    $this.after(frame);
    // Listen for clicks to the button
    $this.on('click',function(){
      var fileInput = frame.contents().find(opts.fileInputEle);
      var fileSubmit = frame.contents().find(opts.fileSubmitEle);
      var fileForm = frame.contents().find(opts.fileFormEle);
      fileInput.click();

      fileInput.one("change", function(){

        fileSubmit.click();

        // Start loading if function was specified
        if (opts.loadingStart) opts.loadingStart($this);

        frame.one('load',function(){
          var res = $.parseJSON(frame.contents().text());
          if (res.error) {
            console.log(res.error);
          } else {
            if (opts.callback) opts.callback(res, $this);
          }
          if (opts.loadingStop) opts.loadingStop($this);

          // Reset the frame src
          // If some is as fast as lightening or the network is terribly slow, they may attempt
          // to click the element again before the iframe loads. In this case the button will
          // simply do nothing. Once it loads it will be functional again. This should never
          // happen.
          frame.attr('src',opts.formSrc);

        });
      });
    });

  };

  var defaults = $.fn.defaults = {
    formSrc: "upload_file_form.php",
    fileInputEle: "input[type=file]",
    fileSubmitEle: "input[type=submit]",
    fileFormEle: "form",
    callback: false,
    loadingStart: false,
    loadingStop: false
  };

})(jQuery);
