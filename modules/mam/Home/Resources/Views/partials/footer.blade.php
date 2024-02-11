<footer>
    <div class="footer-area pt-50 bg-white">
        <div class="container">
            <div class="row pb-30">
                @foreach($categories->chunk(8) as $chunkedCategory)
                    <div class="col">
                        <ul class="float-right ml-30 font-medium">
                            @foreach($chunkedCategory as $category)
                                <li class="cat-item cat-item-2"><a href="category.html">{{ $category->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- footer-bottom aera -->
    <div class="footer-bottom-area bg-white text-muted">
        <div class="container">
            <div class="footer-border pt-20 pb-20">
                <div class="row d-flex mb-15">
                    <div class="col-12">
                        <ul class="list-inline font-small">
                            <li class="list-inline-item"><a href="category.html">خانه</a></li>
                            <li class="list-inline-item"><a href="category.html">نویسندگان</a></li>
                            <li class="list-inline-item"><a href="category.html">درباره ما</a></li>
                            <li class="list-inline-item"><a href="category.html">تماس با ما</a></li>
                            <li class="list-inline-item"><a href="category.html">نظرات</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-12">
                        <div class="footer-copy-right">
                            <p class="font-small text-muted">© 1402 ، نیوز وایرال | کلیه حقوق محفوظ است | ساخته
                                شده توسط <a href="#" target="_blank">Mohammad Reza Amini</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
