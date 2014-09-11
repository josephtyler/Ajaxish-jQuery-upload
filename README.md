Ajaxish jQuery Uploader
=====================

An ajaxish jQuery file uploader. Called "ajaxish" because it only simulates an asynchronous javascript request to the server. In fact, this uploader uses a normal HTTP request within a hidden iframe.


####Instantiation

```
$("#someElement").ajaxish()
```

####What this does

Instantiating with no options will add a click event handler onto #someElement and add a hidden iframe onto the page with the src = "upload_file_form.php". This is likely an option you'll want to change. The form source should be an HTTP accessible page with an HTML form, and upon submission it should respond with json. The demo gives a very basic example of this file.

####Options

#####Defaults

These are all the options available and their default values:

```
formSrc: "upload_file_form.php",
fileInputEle: "input[type=file]",
fileSubmitEle: "input[type=submit]",
fileFormEle: "form",
callback: false,
loadingStart: false,
loadingStop: false
```


######formSrc

The formSrc is the url to be used in the hidden iframe src. This is the location of your file upload form.


######fileInputEle

This is the html input used to upload a file. This can be any jQuery selector.


######fileSubmitEle

This is the html input used to submit the form. This can be any jQuery selector.


######fileFormEle

This is the html form element you want to use. This is useful if there are multiple forms on your formSrc.


######callback


This is a function that will be called as soon as the file finishes uploading and the json response is received. The json response is passed into the callback function as the first parameter. The second parameter is the jQuery object representing the button clicked in the parent.


######loadingStart


This is a function that gets called when the form submission begins. This is useful for adding a loading animation. The jQuery object representing the button clicked in the parent is passed in as the only paramenter.


######loadingStop

This is a function that gets called when the form submission ends. This is useful for stopping a loading animation. The jQuery object representing the button clicked in the parent is passed in as the only paramenter.
