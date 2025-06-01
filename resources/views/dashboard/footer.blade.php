
<style>
    /* Example CSS styles for the bottom header */
    .bottom-header {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #ffffff;
        border-top: 1px solid #e0e0e0;
        padding: 10px 20px;
        box-shadow: 0px -2px 5px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .bottom-header ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        max-width: 600px; /* Adjust as needed */
    }

    .bottom-header li {
        margin: 0 10px; /* Adjust spacing between items */
    }

    .link-item {
        display: flex;
        align-items: center;
    }

    .link-item i {
        margin-right: 5px; /* Adjust icon spacing */
    }

    .link-item a {
        color: #333333;
        text-decoration: none;
        font-weight: bold;
        font-size: 14px; /* Adjust font size as needed */
    }

    /* Media queries for responsiveness */
    @media screen and (max-width: 768px) {
        .bottom-header ul {
            max-width: 100%; /* Full width on smaller screens */
        }

        .link-item a {
            font-size: 12px; /* Adjust font size for smaller screens */
        }
    }
</style>
</head>

<body>
<!-- Your existing HTML content -->

<!-- Bottom Header -->
<div class="bottom-header">
    <ul>
        <li>
            <div class="link-item">
                <i class="fa fa-drivers-license-o"></i>
                <a href="{{route('dashboard')}}">Overview</a>
            </div>
        </li>
        <li>
            <div class="link-item">
                <i class="fa fa-bank"></i>
                <a href="{{route('bank')}}">Transfer</a>
            </div>
        </li>
        <li>
            <div class="link-item">
                <i class="fa fa-id-card-o"></i>
                <a href="{{route('card')}}">Cards</a>
            </div>
        </li>
        <li>
            <div class="link-item">
                <i class="fa fa-history"></i>
                <a href="{{route('transactions')}}">History</a>
            </div>
        </li>
        <!-- Logout Link -->
        <li>
            <div class="link-item">
                <i class="fa fa-sign-out"></i>
                <a href="{{route('logOut')}}">Logout</a> <!-- Replace 'route('logout')' with the actual logout route -->
            </div>
        </li>
    </ul>
</div>

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{asset('vendor/global/global.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Datatable -->
<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('js/custom.min.js')}}"></script>
<script src="{{asset('js/deznav-init.js')}}"></script>
<script src="{{asset('js/demo.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!--<script src="js/styleSwitcher.js"></script>-->
<script src="{{asset('js/app/app.js')}}"></script>

<script>
    (function($) {
        var table = $('#example5').DataTable({
            searching: false,
            paging: true,
            select: false,
            //info: false,         
            lengthChange: false

        });
        $('#example tbody').on('click', 'tr', function() {
            var data = table.row(this).data();

        });
    })(jQuery);
</script>


</body>

</html>