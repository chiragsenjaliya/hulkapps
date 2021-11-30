var HulkScript = (() => {
    var sidebarToggleFn = () => {
        const sidebarToggle = document.body.querySelector('#sidebarToggle');
        if (sidebarToggle) {
            // Uncomment Below to persist sidebar toggle between refreshes
            // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
            //     document.body.classList.toggle('sb-sidenav-toggled');
            // }
            sidebarToggle.addEventListener('click', event => {
                event.preventDefault();
                document.body.classList.toggle('sb-sidenav-toggled');
                localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));

            })
        }
    },

    uppyUpload = () => {
        const XHRUpload = Uppy.XHRUpload;
        const Dashboard = Uppy.Dashboard;
        const DropTarget = Uppy.DropTarget;

        const uppy = new Uppy.Core({
                debug: true,
                autoProceed: true,
                restrictions: {
                    maxFileSize: 5000000,
                    allowedFileTypes: ['application/pdf'],
                }
            })
            .use(Dashboard, {
                trigger: '#upload-files',
                inline: false,
                target: '#uppy_upload',
                showProgressDetails: true,
                note: 'PDF Files Only, up to 5 MB',
                height: 470,
                browserBackButtonClose: false
            })
            .use(DropTarget, {
                target: document.body
            })
            .use(XHRUpload, {
                endpoint: '/pdf/upload',
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });

        uppy.on('upload-success', (file, response) => {
            const result = response.body;
            if(result.success) {
                $('.pdf-title').html(result.pdf.name);
                loadPdf(result.pdf.file_path);
                Livewire.emit('refreshPDFList')
            }
        })

        uppy.on('dashboard:modal-closed', () => {
            uppy.reset()
        })
    },
    loadPdf = (url) => {
        console.log(url)
        // Loaded via <script> tag, create shortcut to access PDF.js exports.
        var pdfjsLib = window['pdfjs-dist/build/pdf'];

        // The workerSrc property shall be specified.
        pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

        // Asynchronous download of PDF
        var loadingTask = pdfjsLib.getDocument(url);
        loadingTask.promise.then(function (pdf) {

            // Fetch the first page
            var pageNumber = 1;
            pdf.getPage(pageNumber).then(function (page) {
                console.log('Page loaded');

                var scale = 1.5;
                var viewport = page.getViewport({
                    scale: scale
                });

                // Prepare canvas using PDF page dimensions
                var canvas = document.getElementById('the-canvas');
                var context = canvas.getContext('2d');
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                // Render PDF page into canvas context
                var renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                var renderTask = page.render(renderContext);
                renderTask.promise.then(function () {
                    console.log('Page rendered');
                });
            });
        }, function (reason) {
            // PDF loading error
            console.error(reason);
        });
    }

    return {
        // Public functions
        init: () => {
            sidebarToggleFn();
            uppyUpload();
            $(document).on('click', '.pdf-doc', function(e) {
                $('.pdf-title').html($(this).attr('data-name'));
                loadPdf($(this).attr('data-url'));
            })

            $('.pdf-doc:first').click();
        },
    };

})();
window.addEventListener('DOMContentLoaded', event => {
    HulkScript.init();
});
