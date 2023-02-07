<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$name}}</title>
    <link rel="preconnect" href="https://cdn.skypack.dev">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/highlight.min.css" />
    <script src="scripts/highlight/highlight.min.js" defer></script>
    <script charset="UTF-8" src="scripts/highlight/xml.min.js" defer></script>
    
    <script src="scripts/main.js" type="module"></script>
    @include('layout.head')
    <style>
        .fade:not(.show) {
            opacity: 1 !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <!-- Navbar -->
        @include('layout.nav', ['status' => $name])
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$name}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">{{$name}}</li>
                    </ol>
                </div>
                </div>
            </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="template_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="templates_tbody">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>


        <div class="modal fade" id="modal-templates-add">
            <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                <!-- <h4 class="modal-title">Add Template</h4> -->
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
                </div>
                <form class="form-horizontal templates-form" action="templates/add_template" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="flag" value="save" />
                        <input type="hidden" name="template_id" value="" />
                        <div class="card-body">
                            <div class="form-group">
                                <label for="templateName" class="col-sm-2 col-form-label">TemplateName</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" name="templateName" id="templateName" placeholder="template name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="templateForm" class="col-sm-2 col-form-label">Template</label>
                                
                                <!------>
                                <a class="skip-to-content button" href="#main">Skip to contract content</a>
                                <a class="skip-to-content button" href="#below-contract">Skip to signature</a>

                                <div id="wysiwyg-wrap" class="w-medium flex-1">
                                    <!-- Toolbar -->
                                    <div title="Toolbar" id="toolbar-wrap" class="animate fade">
                                        <div id="toolbar">
                                            <button title="Scroll down" type="button"
                                                onclick="document.querySelector('#below-contract').scrollIntoView()">
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                        <use href="#down-circle"></use>
                                                </svg>
                                            </button>
                                            <span class="ql-formats">
                                                <!-- Bold, italic, and underline buttons -->
                                                <button aria-label="Bold" type="button" class="ql-bold"></button>
                                                <button aria-label="Italic" type="button" class="ql-italic"></button>
                                                <button aria-label="Underline" type="button" class="ql-underline"></button>
                                            </span>
                                            <span class="ql-formats">
                                                <!-- Headings dropdown -->
                                                <select aria-label="Heading" class="ql-header" style="margin-inline-end: .5rem;">
                                                    <option selected></option>
                                                    <option value="1"></option>
                                                    <option value="2"></option>
                                                    <option value="3"></option>
                                                </select>
                                                <select aria-label="Align" class="ql-align">
                                                    <option selected></option>
                                                    <option value="center"></option>
                                                    <option value="right"></option>
                                                    <option value="justify"></option>
                                                </select>
                                            </span>
                                            <span class="ql-formats" style="display: none;">
                                                <!-- Subscript and superscript buttons -->
                                                <button type="button" class="ql-script" value="sub"></button>
                                                <button type="button" class="ql-script" value="super"></button>
                                            </span>
                                            <span class="ql-formats">
                                                <!-- Clean button -->
                                                <button aria-label="Clean formatting" type="button" class="ql-clean"></button>
                                            </span>

                                            <!-- https://codepen.io/nonsalant/pen/YzvBNNg/e0bc9e0853f4de48c02256e5d5de7441https://codepen.io/nonsalant/pen/YzvBNNg/e0bc9e0853f4de48c02256e5d5de7441 -->
                                            <!-- <button class="ql-html">HTML</button> -->

                                            <span class="ql-formats">
                                                <button aria-label="Ordered list" type="button" class="ql-list" value="ordered"></button>
                                                <button aria-label="Bullet list" type="button" class="ql-list" value="bullet"></button>
                                            </span>

                                            <span class="ql-formats">
                                                <button aria-label="Indent +1" type="button" class="ql-indent" value="-1"></button>
                                                <button aria-label="Indent -1" type="button" class="ql-indent" value="+1"></button>
                                            </span>

                                            <span class="ql-formats">
                                                <button title="Insert an image" type="button" class="ql-image"></button>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Editor -->
                                    <div id="main" class="editor-container | animate slide">
                                        <div style="padding-inline: clamp(20px,5vw,35px); padding-block-start: 2.5rem; color: var(--clr-green-desaturated-500);">
                                            Loading contract…
                                        </div>
                                    </div>
                                </div>

                                <div class="below-contract flow | animate fade delay-3">
                                    <div id="below-contract" class="signature-area w-medium padding-clamp">
                                        <div id="signature-container">

                                            <!-- Signature -->
                                            <div id="canvas-container">
                                                <canvas aria-label="Input signature" id="generator-signature-pad" class="signature-pad" width="736" height="230"></canvas>
                                            </div>

                                            <!-- Action Buttons -->
                                            <div id="signature-controls" style='display:none;'>
                                                <div class="flexi">
                                                    <button id="clear-signature" type="button" class="icon-button button warning">
                                                        <span>Clear <span class="hide-small">signature</span></span>
                                                        <span class="icon">
                                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                                                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                                <use href="#icon-erase"></use>
                                                            </svg>
                                                        </span>
                                                    </button>

                                                    <button id="show-modal-preview" type="button" class="icon-button button success preview">
                                                        <span>Preview <span class="hide-small">as Client</span></span>
                                                        <span class="icon">
                                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024"
                                                                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                                <use href="#icon-preview"></use>
                                                            </svg>
                                                        </span>
                                                    </button>

                                                    <button id="show-modal-qr" type="button" class="open-button | icon-button button"
                                                        title="Show QR: scan this code to open the page on another device">
                                                        <span class="icon small-padding">
                                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1"
                                                                viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                                <use href="#icon-qr"></use>
                                                            </svg>
                                                        </span>
                                                    </button>

                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="generator-options flow padding-clamp w-medium" style="display:none;">

                                        <div class="generator-main-options flow">

                                            <!-- Name fields -->
                                            <details class="animate slide delay-1">
                                                <summary>
                                                    Names (optional)
                                                </summary>
                                                <form class="panel flexi">
                                                    <p class="grid">
                                                        <label for="dev_name">Your name:</label>
                                                        <input type="text" name="dev_name" id="dev_name" placeholder="">
                                                    </p>
                                                    <p class="grid">
                                                        <label for="client_name">Your client's name:</label>
                                                        <input type="text" name="client_name" id="client_name" placeholder="">
                                                    </p>

                                                    <p>
                                                        Names appear above signatures when&nbsp;set.
                                                    </p>
                                                </form>
                                            </details>

                                            <!-- Email fields -->
                                            <details class="animate slide delay-0">
                                                <summary>
                                                    Emails (optional)
                                                </summary>
                                                <form class="panel flexi">
                                                    <p class="grid">
                                                        <label for="dev_email">Your email:</label>
                                                        <input type="email" name="dev_email" id="dev_email" placeholder="you@example.com">
                                                    </p>
                                                    <p class="grid">
                                                        <label for="client_email">Your client's email:</label>
                                                        <input type="email" name="client_email" id="client_email" placeholder="client@example.com">
                                                    </p>

                                                    <p>
                                                        No emails will be sent now. The contract (PHP file) will send a confirmation email to both
                                                        addresses when the second
                                                        party signs the contract.
                                                    </p>
                                                </form>
                                            </details>

                                            <!-- Reset data -->
                                            <details class="danger | animate slide delay-2">
                                                <summary>
                                                    Reset data…
                                                </summary>
                                                <div class="panel">
                                                    <div class="flow">
                                                        <div>
                                                            <p>⚠️ <b style="font-weight: 600;">Local browser data will be deleted</b> and replaced
                                                                with
                                                                default content.
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <button id="clear-local-storage" type="button" class="icon-button button danger">
                                                                <span>Reset</span>
                                                                <span class="icon">
                                                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                                        viewBox="0 0 24 24" height="1em" width="1em"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <use href="#icon-delete"></use>
                                                                    </svg>
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </details>

                                        </div>

                                        <form class="generator-download-options sticky-1 flow | animate slide delay-0" id="download-form"
                                            name="download-form" style="display: none;">

                                            <!-- Filename field -->
                                            <div class="flexi">
                                                <p class="grid">
                                                    <label class="animate slide" for="contract_filename">
                                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" role="img"
                                                            viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                            <use href="#icon-php"></use>
                                                        </svg>
                                                        Filename:
                                                    </label>
                                                    <span class="animate slide delay-1">
                                                        <input type="text" name="contract_filename" id="contract_filename" value=""
                                                            required>&nbsp;.php
                                                    </span>
                                                </p>
                                            </div>
                                          

                                        </form>
                                    </div>

                                </div>


                                <!-- svg icon data -->
                                <svg class="hidden">
                                    <symbol id="down-circle">
                                        <path
                                            d="M690 405h-46.9c-10.2 0-19.9 4.9-25.9 13.2L512 563.6 406.8 418.2c-6-8.3-15.6-13.2-25.9-13.2H334c-6.5 0-10.3 7.4-6.5 12.7l178 246c3.2 4.4 9.7 4.4 12.9 0l178-246c3.9-5.3.1-12.7-6.4-12.7z">
                                        </path>
                                        <path
                                            d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z">
                                        </path>
                                    </symbol>
                                    <symbol id="icon-new-tab">
                                        <path fill="currentColor"
                                            d="M576 24v127.984c0 21.461-25.96 31.98-40.971 16.971l-35.707-35.709-243.523 243.523c-9.373 9.373-24.568 9.373-33.941 0l-22.627-22.627c-9.373-9.373-9.373-24.569 0-33.941L442.756 76.676l-35.703-35.705C391.982 25.9 402.656 0 424.024 0H552c13.255 0 24 10.745 24 24zM407.029 270.794l-16 16A23.999 23.999 0 0 0 384 303.765V448H64V128h264a24.003 24.003 0 0 0 16.97-7.029l16-16C376.089 89.851 365.381 64 344 64H48C21.49 64 0 85.49 0 112v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V287.764c0-21.382-25.852-32.09-40.971-16.97z">
                                        </path>
                                    </symbol>
                                    <symbol id="icon-php">
                                        <path
                                            d="M7.01 10.207h-.944l-.515 2.648h.838c.556 0 .97-.105 1.242-.314.272-.21.455-.559.55-1.049.092-.47.05-.802-.124-.995-.175-.193-.523-.29-1.047-.29zM12 5.688C5.373 5.688 0 8.514 0 12s5.373 6.313 12 6.313S24 15.486 24 12c0-3.486-5.373-6.312-12-6.312zm-3.26 7.451c-.261.25-.575.438-.917.551-.336.108-.765.164-1.285.164H5.357l-.327 1.681H3.652l1.23-6.326h2.65c.797 0 1.378.209 1.744.628.366.418.476 1.002.33 1.752a2.836 2.836 0 0 1-.305.847c-.143.255-.33.49-.561.703zm4.024.715l.543-2.799c.063-.318.039-.536-.068-.651-.107-.116-.336-.174-.687-.174H11.46l-.704 3.625H9.388l1.23-6.327h1.367l-.327 1.682h1.218c.767 0 1.295.134 1.586.401s.378.7.263 1.299l-.572 2.944h-1.389zm7.597-2.265a2.782 2.782 0 0 1-.305.847c-.143.255-.33.49-.561.703a2.44 2.44 0 0 1-.917.551c-.336.108-.765.164-1.286.164h-1.18l-.327 1.682h-1.378l1.23-6.326h2.649c.797 0 1.378.209 1.744.628.366.417.477 1.001.331 1.751zM17.766 10.207h-.943l-.516 2.648h.838c.557 0 .971-.105 1.242-.314.272-.21.455-.559.551-1.049.092-.47.049-.802-.125-.995s-.524-.29-1.047-.29z">
                                        </path>
                                    </symbol>
                                    <symbol id="icon-download">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="7 10 12 15 17 10"></polyline>
                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                    </symbol>
                                    <symbol id="icon-delete">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path fill="none" d="M0 0h24v24H0V0z"></path>
                                        <path
                                            d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zm2.46-7.12l1.41-1.41L12 12.59l2.12-2.12 1.41 1.41L13.41 14l2.12 2.12-1.41 1.41L12 15.41l-2.12 2.12-1.41-1.41L10.59 14l-2.13-2.12zM15.5 4l-1-1h-5l-1 1H5v2h14V4z">
                                        </path>
                                    </symbol>
                                    <symbol id="icon-qr">
                                        <path
                                            d="M5 1h-4v4h4v-4zM6 0v0 6h-6v-6h6zM2 2h2v2h-2zM15 1h-4v4h4v-4zM16 0v0 6h-6v-6h6zM12 2h2v2h-2zM5 11h-4v4h4v-4zM6 10v0 6h-6v-6h6zM2 12h2v2h-2zM7 0h1v1h-1zM8 1h1v1h-1zM7 2h1v1h-1zM8 3h1v1h-1zM7 4h1v1h-1zM8 5h1v1h-1zM7 6h1v1h-1zM7 8h1v1h-1zM8 9h1v1h-1zM7 10h1v1h-1zM8 11h1v1h-1zM7 12h1v1h-1zM8 13h1v1h-1zM7 14h1v1h-1zM8 15h1v1h-1zM15 8h1v1h-1zM1 8h1v1h-1zM2 7h1v1h-1zM0 7h1v1h-1zM4 7h1v1h-1zM5 8h1v1h-1zM6 7h1v1h-1zM9 8h1v1h-1zM10 7h1v1h-1zM11 8h1v1h-1zM12 7h1v1h-1zM13 8h1v1h-1zM14 7h1v1h-1zM15 10h1v1h-1zM9 10h1v1h-1zM10 9h1v1h-1zM11 10h1v1h-1zM13 10h1v1h-1zM14 9h1v1h-1zM15 12h1v1h-1zM9 12h1v1h-1zM10 11h1v1h-1zM12 11h1v1h-1zM13 12h1v1h-1zM14 11h1v1h-1zM15 14h1v1h-1zM10 13h1v1h-1zM11 14h1v1h-1zM12 13h1v1h-1zM13 14h1v1h-1zM10 15h1v1h-1zM12 15h1v1h-1zM14 15h1v1h-1z">
                                        </path>
                                    </symbol>
                                    <symbol id="icon-preview">
                                        <path
                                            d="M942.2 486.2C847.4 286.5 704.1 186 512 186c-192.2 0-335.4 100.5-430.2 300.3a60.3 60.3 0 0 0 0 51.5C176.6 737.5 319.9 838 512 838c192.2 0 335.4-100.5 430.2-300.3 7.7-16.2 7.7-35 0-51.5zM512 766c-161.3 0-279.4-81.8-362.7-254C232.6 339.8 350.7 258 512 258c161.3 0 279.4 81.8 362.7 254C791.5 684.2 673.4 766 512 766zm-4-430c-97.2 0-176 78.8-176 176s78.8 176 176 176 176-78.8 176-176-78.8-176-176-176zm0 288c-61.9 0-112-50.1-112-112s50.1-112 112-112 112 50.1 112 112-50.1 112-112 112z">
                                        </path>
                                    </symbol>
                                    <symbol id="icon-erase">
                                        <path
                                            d="M20.454,19.028h-7.01l6.62-6.63a2.935,2.935,0,0,0,.87-2.09,2.844,2.844,0,0,0-.87-2.05l-3.42-3.44a2.93,2.93,0,0,0-4.13.01L3.934,13.4a2.946,2.946,0,0,0,0,4.14l1.48,1.49H3.554a.5.5,0,0,0,0,1h16.9A.5.5,0,0,0,20.454,19.028Zm-7.24-13.5a1.956,1.956,0,0,1,2.73,0l3.42,3.44a1.868,1.868,0,0,1,.57,1.35,1.93,1.93,0,0,1-.57,1.37l-5.64,5.64-6.15-6.16Zm-1.19,13.5h-5.2l-2.18-2.2a1.931,1.931,0,0,1,0-2.72l2.23-2.23,6.15,6.15Z">
                                        </path>
                                    </symbol>
                                </svg>

                                <!-- Preview modal -->
                                <dialog class="modal" id="modal-preview">
                                    <header class="modal-header">
                                        <button id="close-modal-preview" class="close-button button" aria-label="close" type="button"></button>
                                    </header>
                                    <iframe frameborder="0" id="iframe" title="Preview"></iframe>
                                </dialog>

                                <!-- QR modal -->
                                <dialog class="modal flow" id="modal-qr">
                                    <div class="qr-code-container">
                                        <button id="close-modal-qr" class="close-button button" aria-label="close" type="button"></button>
                                        <canvas id="generator-qr-code"></canvas>
                                    </div>
                                </dialog>


                                <!------>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary create-template-button">Create Template</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        

        <!-- /.content-wrapper -->
        <!-- @include('layout.footer') -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <script src="../assets/js/templates.js?<?php echo time(); ?>"></script>
</body>

</html>