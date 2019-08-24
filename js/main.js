jQuery(document).ready(function($) {

    tinymce.create('tinymce.plugins.bsbannershortcode', {
        init : function(ed, url) {
                // Register command for when button is clicked
                ed.addCommand('bs_banner_insertShortcode', function() {
                    selected = tinyMCE.activeEditor.selection.getContent();
                    
                     var template = prompt("Choose Banner template(from 1-10)", "1");
                     if ( template=="1" || template=="4" || template=="5" || template=="8") {
                        var title = prompt("Title of the Banner", "1");
                           var url = prompt("Link of the Banner", "http://");
                           var img = prompt("Image Url of the Banner", "http://");
                           content =  '[bs_banner style="'+template+'" title="'+title+'" url="'+url+'" img="'+img+'"]';
                     }
                     if ( template=="2" || template=="3" || template=="6" || template=="7" || template=="9") {
                        var title = prompt("Title of the Banner", "1");
                        var title2 = prompt("Short Description of the Banner", "1");
                           var url = prompt("Link of the Banner", "http://");
                           var img = prompt("Image Url of the Banner", "http://");
                           content =  '[bs_banner style="'+template+'" title="'+title+'" title2="'+title2+'" url="'+url+'" img="'+img+'"]';
                     }
                     if ( template=="10") {
                           var url = prompt("Link of the Banner", "http://");
                           var img = prompt("Image Url of the Banner", "http://");
                          content =  '[bs_banner style="'+template+'" url="'+url+'" img="'+img+'"]';
                     }

                    tinymce.execCommand('mceInsertContent', false, content);
                });

            // Register buttons - trigger above command when clicked
            ed.addButton('bs_banner_shortcodebtn', {title : 'Insert shortcode', cmd : 'bs_banner_insertShortcode', image: url + '/icon.png' });
        },   
    });

    // Register our TinyMCE plugin
    // first parameter is the button ID1
    // second parameter must match the first parameter of the tinymce.create() function above
    tinymce.PluginManager.add('bs_banner_shortcodebtn', tinymce.plugins.bsbannershortcode);
});






