jQuery(document).ready(function($){
        'use strict';
        function setUpOptionsTabs () {
            $('.metabox-tab-container .cmb-type-title').click(function(){
                var wrapper = $(this).parent();
                var currentContent = wrapper.find('.metabox-tab-content');
                if (wrapper.hasClass('metabox-tab-openstate')===false) {
                    $('.metabox-tab-container').removeClass('metabox-tab-openstate');
                    $('.metabox-tab-content').hide();
                    wrapper.addClass('metabox-tab-openstate');
                    currentContent.slideDown();
                }               
             });
        }

        setUpOptionsTabs();
    });