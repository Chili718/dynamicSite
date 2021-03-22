function uploadAndResizeImage() {

    if (window.File && window.FileReader && window.FileList && window.Blob) {
        var filesToUploads = document.getElementById('image').files;
        var file = filesToUploads[0];
        if(file){

            var reader = new FileReader();
            // Set the image once loaded into file reader
            reader.onload = function(e) {

                var img = document.createElement("img");
                img.src = e.target.result;

                var canvas = document.createElement("canvas");
                var ctx = canvas.getContext("2d");
                ctx.drawImage(img, 0, 0);

                var MAX_WIDTH = 400;
                var MAX_HEIGHT = 400;
                var width = img.width;
                var height = img.height;

                if (width > height) {
                    if (width > MAX_WIDTH) {
                        height *= MAX_WIDTH / width;
                        width = MAX_WIDTH;
                    }
                } else {
                    if (height > MAX_HEIGHT) {
                        width *= MAX_HEIGHT / height;
                        height = MAX_HEIGHT;
                    }
                }

                canvas.width = width;
                canvas.height = height;
                var ctx = canvas.getContext("2d");
                ctx.drawImage(img, 0, 0, width, height);

                dataurl = canvas.toDataURL(file.type);

                var fd = new FormData(document.getElementById('frm'));

                var fileName = file.name.substring(0, file.name.lastIndexOf('.')) + "Min" + file.name.substring(file.name.lastIndexOf('.'));

                console.log(fileName);

                fetch(img.src)
                .then(res => res.blob())
                .then(blob => {
                  fd.append("min", blob, fileName);

                  //const file = new File([blob], 'dot.png', blob)
                  //console.log(file)
                });

                //document.getElementById('output').src = dataurl;

            }
            reader.readAsDataURL(file);
            
        }

    } else {
        alert('The File APIs are not fully supported in this browser.');
    }
}
