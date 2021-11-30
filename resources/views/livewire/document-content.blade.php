<div id="page-content-wrapper">
    <!-- Top navigation-->
    <nav class="navbar navbar-expand-lg navbar-bg-dark-blue">
        <div class="container-fluid">
            <button class="navbar-toggler" id="sidebarToggle"><span class="navbar-toggler-icon"></span></button>
            <h3 class="pdf-title">{{ !empty($pdf) ? $pdf->name : 'No Pdf Found!' }}</h3>
        </div>
    </nav>
    <!-- Page content-->
    <div class="container-fluid overflow-auto vh-90 w-100">
        <canvas id="the-canvas" class="w-100"></canvas>
    </div>
</div>
