<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="generator" content="Google Web Designer 5.0.4.0226">
  <meta name="template" content="Banner 3.0.0">
  <meta name="environment" content="gwd-genericad">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="gwdpage_style.css" rel="stylesheet" data-version="12" data-exports-type="gwd-page">
  <link href="gwdpagedeck_style.css" rel="stylesheet" data-version="12" data-exports-type="gwd-pagedeck">
  <link href="gwdgesture_style.css" rel="stylesheet" data-version="6" data-exports-type="gwd-gesture">
  <link href="gwdimage_style.css" rel="stylesheet" data-version="12" data-exports-type="gwd-image">
  <link href="gwdgallerynavigation_style.css" rel="stylesheet" data-version="5" data-exports-type="gwd-gallerynavigation">
  <link href="gwdcarouselgallery_style.css" rel="stylesheet" data-version="22" data-exports-type="gwd-carouselgallery">
  <style type="text/css" id="gwd-lightbox-style">
    .gwd-lightbox {
      overflow: hidden;
    }
  </style>
  <style type="text/css" id="gwd-text-style">
    p {
      margin: 0px;
    }
    h1 {
      margin: 0px;
    }
    h2 {
      margin: 0px;
    }
    h3 {
      margin: 0px;
    }
  </style>
  <style type="text/css">
    html, body {
      width: 100%;
      height: 100%;
      margin: 0px;
    }
    .gwd-page-container {
      position: relative;
      width: 100%;
      height: 100%;
    }
    .gwd-page-content {
      background-color: transparent;
      transform: perspective(1400px) matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
      transform-style: preserve-3d;
      position: absolute;
    }
    .gwd-page-wrapper {
      background-color: rgb(255, 255, 255);
      position: absolute;
      transform: translateZ(0px);
    }
    .gwd-page-size {
      width: 300px;
      height: 250px;
    }
    .gwd-carouselgallery-1kpp {
      position: absolute;
      left: 2px;
      top: 2px;
      width: 671px;
      height: 344px;
      transform-origin: 335.627px 171.608px 0px;
    }
    .gwd-gallerynavigation-1uvt {
      position: absolute;
      transform-origin: 124px 25px 0px;
      width: 418px;
      height: 84.28px;
      top: 353px;
      left: 132px;
    }
    .gwd-div-v5v5 {
      width: 673px;
      height: 448.17px;
    }
    .gwd-page-1ceh {
      width: 673px;
      height: 448.17px;
    }
  </style>
  <script data-source="googbase_min.js" data-version="4" data-exports-type="googbase" src="googbase_min.js"></script>
  <script data-source="gwd_webcomponents_min.js" data-version="6" data-exports-type="gwd_webcomponents" src="gwd_webcomponents_min.js"></script>
  <script data-source="gwdpage_min.js" data-version="12" data-exports-type="gwd-page" src="gwdpage_min.js"></script>
  <script data-source="gwdpagedeck_min.js" data-version="12" data-exports-type="gwd-pagedeck" src="gwdpagedeck_min.js"></script>
  <script data-source="gwdgenericad_min.js" data-version="5" data-exports-type="gwd-genericad" src="gwdgenericad_min.js"></script>
  <script data-source="gwdgesture_min.js" data-version="6" data-exports-type="gwd-gesture" src="gwdgesture_min.js"></script>
  <script data-source="gwdimage_min.js" data-version="12" data-exports-type="gwd-image" src="gwdimage_min.js"></script>
  <script data-source="gwdgallerynavigation_min.js" data-version="5" data-exports-type="gwd-gallerynavigation" src="gwdgallerynavigation_min.js"></script>
  <script data-source="gwdcarouselgallery_min.js" data-version="22" data-exports-type="gwd-carouselgallery" src="gwdcarouselgallery_min.js"></script>
</head>

<body>
  <gwd-genericad id="gwd-ad">
    <gwd-pagedeck class="gwd-page-container" id="pagedeck">
      <gwd-page id="page1" class="gwd-page-wrapper gwd-page-size gwd-lightbox gwd-page-1ceh" data-gwd-width="673px" data-gwd-height="448.17px">
        <div class="gwd-page-content gwd-page-size gwd-div-v5v5">
          <gwd-carouselgallery id="gwd-carouselgallery_1" scaling="contain" pause-front-media="" resume-next-media="" class="gwd-carouselgallery-1kpp" images="assets/1.jpeg,assets/2.png,assets/3.png"></gwd-carouselgallery>
          <gwd-gallerynavigation id="gwd-gallerynavigation_1" class="gwd-gallerynavigation-1uvt" for="gwd-carouselgallery_1"></gwd-gallerynavigation>
        </div>
      </gwd-page>
    </gwd-pagedeck>
  </gwd-genericad>
  <script type="text/javascript" id="gwd-init-code">
    (function() {
      var gwdAd = document.getElementById('gwd-ad');

      /**
       * Handles the DOMContentLoaded event. The DOMContentLoaded event is
       * fired when the document has been completely loaded and parsed.
       */
      function handleDomContentLoaded(event) {

      }

      /**
       * Handles the WebComponentsReady event. This event is fired when all
       * custom elements have been registered and upgraded.
       */
      function handleWebComponentsReady(event) {
        // Start the Ad lifecycle.
        setTimeout(function() {
          gwdAd.initAd();
        }, 0);
      }

      /**
       * Handles the event that is dispatched after the Ad has been
       * initialized and before the default page of the Ad is shown.
       */
      function handleAdInitialized(event) {}

      window.addEventListener('DOMContentLoaded',
        handleDomContentLoaded, false);
      window.addEventListener('WebComponentsReady',
        handleWebComponentsReady, false);
      window.addEventListener('adinitialized',
        handleAdInitialized, false);
    })();
  </script>
</body>

</html>