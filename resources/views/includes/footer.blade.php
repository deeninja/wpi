<footer>

    <section class="col-md-12 footer-main">

        <!-- quick contact-->
        <div class="col-md-4 quick-contact-container">

            <h1>Quick Contact</h1>
            <h2>Feel free to contact us!</h2>

            <form action="" method="post">
                <input type="text" name="name" placeholder="Your Name">
                <input type="email" name="name" placeholder="Your Email">
                <textarea name="message" cols="30" rows="10" placeholder="Your Message"></textarea>

                <input type="submit" value="Send">
            </form>

        </div>
        <!-- /.quick contact-->


        <!-- footer nav -->
        <section class="col-md-4 footer-nav">
            <ul class="nav">

                <li><a href="{{ url('/blog') }}">News</a></li>
                <li><a href="{{ url('/about-us') }}">About</a></li>
                <li><a href="{{ url('/conferences') }}">Conferences</a></li>

            </ul>

            <!-- /.footer nav -->

            <!-- newsletter quick signup -->
            <div class="newsletter-quick-signup">
                <h2>Sign up for our newsletter</h2>
                <form action="" method="post">
                    <input type="text" name="name" placeholder="Your Name">
                    <input type="email" name="name" placeholder="Your Email">
                    <input type="submit" value="Sign up">
                </form>
            </div>
            <!-- /.newsletter quick signup -->
        </section>


        <!-- fb like -->
        <section class="col-md-4 fb-like-container">
            <h2>On Social Media</h2>

            <div class="inner-like">
                <div class="fb-page" data-href="https://www.facebook.com/WomenPlaywrights"
                     data-tabs="timeline, messages" data-width="600px" data-small-header="true"
                     data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/WomenPlaywrights"
                                class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/WomenPlaywrights">International Women Playwrights</a>
                    </blockquote>
                </div>
            </div>
        </section>
        <!-- /.fb like -->

        <!-- footer copyright social -->
        <div class="col-md-12 footer-social">
            <a target="_blank" href="https://www.facebook.com/WomenPlaywrights"><i class="fa fa-facebook"></i></a>
            <a target="_blank" href="https://www.twitter.com/ICWP?emulatemode=2"><i class="fa fa-twitter"></i></a>
        </div>

        <div class="col-md-12 footer-copy">
            <cite>- &copy; Copyright WPI 2016. Made by William Langroudi. -</cite>
        </div>
        <!-- /.footer copyright social -->
    </section>
</footer>