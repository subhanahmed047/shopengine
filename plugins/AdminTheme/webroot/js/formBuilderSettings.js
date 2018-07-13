jQuery(document).ready(function($) {
  'use strict';
  var template = document.getElementById('fb-template'),
    $buildWrap = $(document.querySelector('.build-form')),
    $renderWrap = $(document.querySelector('.render-form')),
    $renderBtn = $(document.getElementById('render-form-button')),
    formRenderOpts = {
      container: document.getElementById('rendered-form')
    },
    formBuilderOpts = {
      fieldRemoveWarn: true
    };

  $(template).formBuilder(formBuilderOpts);

  var toggleEdit = function() {
    $buildWrap.toggle();
    $renderWrap.toggle();
  };

  $('.form-builder-save').click(function() {
    //alert('Ho ja');
    $(template).formRender(formRenderOpts);
    toggleEdit();

//alert(formRenderOpts.container.innerHTML);

  });

  $renderBtn.click(function() {
    toggleEdit();
  });

});
