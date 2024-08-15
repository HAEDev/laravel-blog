$(document).ready(function() {
    const editor = Jodit.make('#post_content', {
        uploader: {
            url: '/vendor/connector/index.php',
            data: {
                action: 'fileUpload'
            }
        },
        filebrowser: {
            ajax: {
                url: '/vendor/connector/index.php'
            }
        }
    });
});