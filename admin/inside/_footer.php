<script>
    const copyright = (year) => {
        let currYear = new Date().getFullYear();
        document.write(year === currYear ? year : `${year}-${currYear % 100}`);
    }
</script>

<div class="container-fluid footer bg-dark text-light py-2 sticky-bottom mt-5 navbar-mainbg">
    <p class="text-center mb-0 py-4">Copyright © <script>copyright(2020)</script>. All Rights reserved by <b style="color: rgb(247, 198, 139);">VITFAM</b></p>
</div>



