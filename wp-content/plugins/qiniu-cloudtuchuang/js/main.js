/*global Qiniu */
/*global plupload */
/*global FileProgress */
/*global hljs */


JQuery(document).read(function($) {


    var uploader_btn = Qiniu.uploader({
        runtimes: 'html5,flash,html4',
        browse_button: 'qiniu-insert-media-button',
        container: 'qiniu_cloudtuchuang_post_btn',
        drop_element: 'container',
        max_file_size: '1000mb',
        flash_swf_url: 'js/plupload/js/Moxie.swf',
        dragdrop: true,
        chunk_size: '4mb',
        multi_selection: !(mOxie.Env.OS.toLowerCase()==="ios"),
        uptoken_url: uptokenurl,
        // uptoken_func: function(){
        //     var ajax = new XMLHttpRequest();
        //     ajax.open('GET', $('#uptoken_url').val(), false);
        //     ajax.setRequestHeader("If-Modified-Since", "0");
        //     ajax.send();
        //     if (ajax.status === 200) {
        //         var res = JSON.parse(ajax.responseText);
        //         console.log('custom uptoken_func:' + res.uptoken);
        //         return res.uptoken;
        //     } else {
        //         console.log('custom uptoken_func err');
        //         return '';
        //     }
        // },
        domain: host,
        get_new_uptoken: false,
        // downtoken_url: '/downtoken',
        // unique_names: true,
        // save_key: true,
        // x_vars: {
        //     'id': '1234',
        //     'time': function(up, file) {
        //         var time = (new Date()).getTime();
        //         // do something with 'time'
        //         return time;
        //     },
        // },
        auto_start: true,
        log_level: 5,
        init: {
            'FilesAdded': function(up, files) {

            },
            'BeforeUpload': function(up, file) {

            },
            'UploadProgress': function(up, file) {
                span = $('#spandesc').text(file.percent + "%");
            },
            'UploadComplete': function() {
                console.log('上传完成');
                span = $('#spandesc').text('上传完成');
            },
            'FileUploaded': function(up, file, info) {
                var title = $('#title').val();
                console.log(title);
                var obj = eval('(' + info + ')');
                var key = obj.key;
                qiniuurl = host + '/' + key;
                if (imgurl == true) {
                    var img = '<a href="' + qiniuurl + '"><img src="' + qiniuurl
                        + '" alt="' + title
                        + '" title="' + title
                        + '">';
                } else {
                    var img = '<img src="' + qiniuurl
                        + '" alt="'
                        + title
                        + '" title="'
                        + title
                        + '">';
                }
                console.log(img);

                var wpActiveEditor,editor,
                    hasTinymce = typeof tinymce !== 'undefined',
                    hasQuicktags = typeof QTags !== 'undefined';

                if ( ! wpActiveEditor ) {
                    if ( hasTinymce && tinymce.activeEditor ) {
                        editor = tinymce.activeEditor;
                        wpActiveEditor = editor.id;
                    } else if ( ! hasQuicktags ) {
                        return false;
                    }
                } else if ( hasTinymce ) {
                    editor = tinymce.get( wpActiveEditor );
                }

                if ( editor && ! editor.isHidden() ) {
                    editor.execCommand( 'mceInsertContent', false, img );
                } else if ( hasQuicktags ) {
                    QTags.insertContent( img );
                } else {
                    document.getElementById( wpActiveEditor ).value += img;
                }

                // If the old thickbox remove function exists, call it
                if ( window.tb_remove ) {
                    try { window.tb_remove(); } catch( e ) {}
                }


                console.log(key+'设置完成');

            },
            'Error': function(up, err, errTip) {
                console.log(err.file.name + '上传错误:'+ errTip);
                console.log('错误代码：' + err.status);
                var status = err.status;
                if (status == 614) {
                    var title = $('#title').val();
                    console.log(title);
                    var key = err.file.name;
                    qiniuurl = host  + key;
                    if (imgurl == true) {
                        var img = '<a href="' + qiniuurl + '"><img src="' + qiniuurl
                            + '" alt="' + title
                            + '" title="' + title
                            + '">';
                    } else {
                        var img = '<img src="' + qiniuurl
                            + '" alt="'
                            + title
                            + '" title="'
                            + title
                            + '">';
                    }
                    console.log(img);
                    var wpActiveEditor,editor,
                        hasTinymce = typeof tinymce !== 'undefined',
                        hasQuicktags = typeof QTags !== 'undefined';

                    if ( ! wpActiveEditor ) {
                        if ( hasTinymce && tinymce.activeEditor ) {
                            editor = tinymce.activeEditor;
                            wpActiveEditor = editor.id;
                        } else if ( ! hasQuicktags ) {
                            return false;
                        }
                    } else if ( hasTinymce ) {
                        editor = tinymce.get( wpActiveEditor );
                    }


                    if ( editor && ! editor.isHidden() ) {
                        editor.execCommand( 'mceInsertContent', false, img );
                    } else if ( hasQuicktags ) {
                        QTags.insertContent( img );
                    } else {
                        document.getElementById( wpActiveEditor ).value += img;
                    }

                    // If the old thickbox remove function exists, call it
                    if ( window.tb_remove ) {
                        try { window.tb_remove(); } catch( e ) {}
                    }
                };
                span = $('#spandesc').text('上传完成');
            }
             ,
             'Key': function(up, file) {
                 var key = prefix+file.name;
                 // do something with key
                 return key
             }
        }
    });

    uploader_btn.bind('FileUploaded', function() {
        console.log('hi man,a file is uploaded');
    });

    var uploader = Qiniu.uploader({
        runtimes: 'html5,flash,html4',
        browse_button: 'pickfiles',
        container: 'qiniu_cloudtuchuang_post',
        drop_element: 'container',
        max_file_size: '1000mb',
        flash_swf_url: 'js/plupload/js/Moxie.swf',
        dragdrop: true,
        chunk_size: '4mb',
        multi_selection: !(mOxie.Env.OS.toLowerCase()==="ios"),
        uptoken_url: uptokenurl,
        // uptoken_func: function(){
        //     var ajax = new XMLHttpRequest();
        //     ajax.open('GET', $('#uptoken_url').val(), false);
        //     ajax.setRequestHeader("If-Modified-Since", "0");
        //     ajax.send();
        //     if (ajax.status === 200) {
        //         var res = JSON.parse(ajax.responseText);
        //         console.log('custom uptoken_func:' + res.uptoken);
        //         return res.uptoken;
        //     } else {
        //         console.log('custom uptoken_func err');
        //         return '';
        //     }
        // },
        domain: host,
        get_new_uptoken: false,
        // downtoken_url: '/downtoken',
        // unique_names: true,
        // save_key: true,
        // x_vars: {
        //     'id': '1234',
        //     'time': function(up, file) {
        //         var time = (new Date()).getTime();
        //         // do something with 'time'
        //         return time;
        //     },
        // },
        auto_start: true,
        log_level: 5,
        init: {
            'FilesAdded': function(up, files) {

            },
            'BeforeUpload': function(up, file) {

            },
            'UploadProgress': function(up, file) {
                span = $('#spantxt').text(file.percent + "%");
            },
            'UploadComplete': function() {
                console.log('上传完成');
                span = $('#spantxt').text('上传完成');
            },
            'FileUploaded': function(up, file, info) {
                var title = $('#title').val();
                console.log(title);
                var obj = eval('(' + info + ')');
                var key = obj.key;
                qiniuurl = host + '/' + key;
                if (imgurl == true) {
                    var img = '<a href="' + qiniuurl + '"><img src="' + qiniuurl
                        + '" alt="' + title
                        + '" title="' + title
                        + '">';
                } else {
                    var img = '<img src="' + qiniuurl
                        + '" alt="'
                        + title
                        + '" title="'
                        + title
                        + '">';
                }
                console.log(img);
                var wpActiveEditor,editor,
                    hasTinymce = typeof tinymce !== 'undefined',
                    hasQuicktags = typeof QTags !== 'undefined';

                if ( ! wpActiveEditor ) {
                    if ( hasTinymce && tinymce.activeEditor ) {
                        editor = tinymce.activeEditor;
                        wpActiveEditor = editor.id;
                    } else if ( ! hasQuicktags ) {
                        return false;
                    }
                } else if ( hasTinymce ) {
                    editor = tinymce.get( wpActiveEditor );
                }


                if ( editor && ! editor.isHidden() ) {
                    editor.execCommand( 'mceInsertContent', false, img );
                } else if ( hasQuicktags ) {
                    QTags.insertContent( img );
                } else {
                    document.getElementById( wpActiveEditor ).value += img;
                }

                // If the old thickbox remove function exists, call it
                if ( window.tb_remove ) {
                    try { window.tb_remove(); } catch( e ) {}
                }
                console.log(key+'设置完成');

            },
            'Error': function(up, err, errTip) {
                console.log(err.file.name + '上传错误:'+ errTip);
                console.log('错误代码：' + err.status);
                var status = err.status;
                if (status == 614) {
                    var title = $('#title').val();
                    console.log(title);
                    var key = err.file.name;
                    qiniuurl = host  + key;
                    if (imgurl == true) {
                        var img = '<a href="' + qiniuurl + '"><img src="' + qiniuurl
                            + '" alt="' + title
                            + '" title="' + title
                            + '">';
                    } else {
                        var img = '<img src="' + qiniuurl
                            + '" alt="'
                            + title
                            + '" title="'
                            + title
                            + '">';
                    }
                    console.log(img);
                    var wpActiveEditor,editor,
                        hasTinymce = typeof tinymce !== 'undefined',
                        hasQuicktags = typeof QTags !== 'undefined';

                    if ( ! wpActiveEditor ) {
                        if ( hasTinymce && tinymce.activeEditor ) {
                            editor = tinymce.activeEditor;
                            wpActiveEditor = editor.id;
                        } else if ( ! hasQuicktags ) {
                            return false;
                        }
                    } else if ( hasTinymce ) {
                        editor = tinymce.get( wpActiveEditor );
                    }


                    if ( editor && ! editor.isHidden() ) {
                        editor.execCommand( 'mceInsertContent', false, img );
                    } else if ( hasQuicktags ) {
                        QTags.insertContent( img );
                    } else {
                        document.getElementById( wpActiveEditor ).value += img;
                    }

                    // If the old thickbox remove function exists, call it
                    if ( window.tb_remove ) {
                        try { window.tb_remove(); } catch( e ) {}
                    }
                };
                span = $('#spantxt').text('上传完成');
            }
             ,
             'Key': function(up, file) {
                 var key = prefix+file.name;
                 // do something with key
                 return key
             }
        }
    });

    uploader.bind('FileUploaded', function() {
        console.log('hi man,a file is uploaded');
    });
    $('#container').on(
        'dragenter',
        function(e) {
            e.preventDefault();
            $('#container').addClass('draging');
            e.stopPropagation();
        }
    ).on('drop', function(e) {
        e.preventDefault();
        $('#container').removeClass('draging');
        e.stopPropagation();
    }).on('dragleave', function(e) {
        e.preventDefault();
        $('#container').removeClass('draging');
        e.stopPropagation();
    }).on('dragover', function(e) {
        e.preventDefault();
        $('#container').addClass('draging');
        e.stopPropagation();
    });



    $('#show_code').on('click', function() {
        $('#myModal-code').modal();
        $('pre code').each(function(i, e) {
            hljs.highlightBlock(e);
        });
    });


    $('body').on('click', 'table button.btn', function() {
        $(this).parents('tr').next().toggle();
    });


    var getRotate = function(url) {
        if (!url) {
            return 0;
        }
        var arr = url.split('/');
        for (var i = 0, len = arr.length; i < len; i++) {
            if (arr[i] === 'rotate') {
                return parseInt(arr[i + 1], 10);
            }
        }
        return 0;
    };

    $('#myModal-img .modal-body-footer').find('a').on('click', function() {
        var img = $('#myModal-img').find('.modal-body img');
        var key = img.data('key');
        var oldUrl = img.attr('src');
        var originHeight = parseInt(img.data('h'), 10);
        var fopArr = [];
        var rotate = getRotate(oldUrl);
        if (!$(this).hasClass('no-disable-click')) {
            $(this).addClass('disabled').siblings().removeClass('disabled');
            if ($(this).data('imagemogr') !== 'no-rotate') {
                fopArr.push({
                    'fop': 'imageMogr2',
                    'auto-orient': true,
                    'strip': true,
                    'rotate': rotate,
                    'format': 'png'
                });
            }
        } else {
            $(this).siblings().removeClass('disabled');
            var imageMogr = $(this).data('imagemogr');
            if (imageMogr === 'left') {
                rotate = rotate - 90 < 0 ? rotate + 270 : rotate - 90;
            } else if (imageMogr === 'right') {
                rotate = rotate + 90 > 360 ? rotate - 270 : rotate + 90;
            }
            fopArr.push({
                'fop': 'imageMogr2',
                'auto-orient': true,
                'strip': true,
                'rotate': rotate,
                'format': 'png'
            });
        }

        $('#myModal-img .modal-body-footer').find('a.disabled').each(function() {

            var watermark = $(this).data('watermark');
            var imageView = $(this).data('imageview');
            var imageMogr = $(this).data('imagemogr');

            if (watermark) {
                fopArr.push({
                    fop: 'watermark',
                    mode: 1,
                    image: 'http://www.b1.qiniudn.com/images/logo-2.png',
                    dissolve: 100,
                    gravity: watermark,
                    dx: 100,
                    dy: 100
                });
            }

            if (imageView) {
                var height;
                switch (imageView) {
                    case 'large':
                        height = originHeight;
                        break;
                    case 'middle':
                        height = originHeight * 0.5;
                        break;
                    case 'small':
                        height = originHeight * 0.1;
                        break;
                    default:
                        height = originHeight;
                        break;
                }
                fopArr.push({
                    fop: 'imageView2',
                    mode: 3,
                    h: parseInt(height, 10),
                    q: 100,
                    format: 'png'
                });
            }

            if (imageMogr === 'no-rotate') {
                fopArr.push({
                    'fop': 'imageMogr2',
                    'auto-orient': true,
                    'strip': true,
                    'rotate': 0,
                    'format': 'png'
                });
            }
        });

        var newUrl = Qiniu.pipeline(fopArr, key);

        var newImg = new Image();
        img.attr('src', 'images/loading.gif');
        newImg.onload = function() {
            img.attr('src', newUrl);
            img.parent('a').attr('href', newUrl);
        };
        newImg.src = newUrl;
        return false;
    });

});

