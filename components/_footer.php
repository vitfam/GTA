<script>
    const copyright = (year) => {
        let currYear = new Date().getFullYear();
        document.write(year === currYear ? year : `${year}-${currYear % 100}`);

    }
</script>

<div class="container-fluid footer d-flex justify-content-center bg-light text-dark py-2 sticky-bottom mt-5">
    <div class="container pb-2 pt-4">
        <div class="row">
            <div class="col-md-6 col-lg-8 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item"><a href="https://www.linkedin.com/company/vitfam" target="_blank" ><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fab fa-linkedin fa-stack-1x fa-inverse"></i></span></a></li>
                    <li class="list-inline-item"><a href="https://instagram.com/vitfam_/" target="_blank" ><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fab fa-instagram fa-stack-1x fa-inverse"></i></span></a></li>
                    <li class="list-inline-item"><a href="https://linktr.ee/vitfam/" target="_blank" ><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fas fa-link fa-stack-1x fa-inverse"></i></span></a></li>
                </ul>
                <p class="copyright text-muted text-center">Copyright © <script>copyright(2020)</script>. All rights reserved by <b>VITFAM</b>.</p>
            </div>
        </div>
    </div>
</div>