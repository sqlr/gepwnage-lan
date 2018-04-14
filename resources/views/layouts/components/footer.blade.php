<div class="container text-muted">
    <div class="row">
        <div class="col-md-5 my-3">
            <h4>Organisation / Fraternity</h4>
            <img src="{{ asset('images/logo_100x69.png') }}" class="pull-left m-1 mr-3" style="height: 2.3rem;"/>
            <p>
                Dispuut
                <a href="https://gepwnage.nl/" target="_blank"
                   class="font-weight-bold" style="color: #1e70bf;">GEPWNAGE</a><br/>
                <a href="mailto:lan@gepwnage.nl" class="text-muted">lan@gepwnage.nl</a>
            </p>
            <div class="clearfix my-4"></div>
            <h4>Study Association</h4>
            <img src="{{ asset('images/gewis.svg') }}" class="pull-left m-1 mr-3"/>
            <p>
                Studievereniging
                <a href="https://gewis.nl/" target="_blank" class="text-gewis font-weight-bold">GEWIS</a><br>
                <a href="https://www.tue.nl/" target="_blank" class="text-light">TU/e</a> - MF 3.155<br>
                De Groene Loper 5<br>
                5612 AZ, Eindhoven
            </p>
        </div>
        <div class="col-md-3 my-3">
            <h4>Contact Us</h4>
            <a href="http://gepwnage.nl/" target="_blank"
               class="text-muted">
                <i class="fa fa-fw fa-link"></i> GEPWNAGE.nl
            </a>
            <br/>
            <a href="mailto:lan@gepwnage.nl"
               class="text-muted">
                <i class="fa fa-fw fa-envelope"></i> E-mail
            </a>
            <br/>
            <a href="https://www.linkedin.com/company-beta/10656960/" target="_blank"
               class="text-muted">
                <i class="fa fa-fw fa-linkedin"></i> LinkedIn
            </a>
            <br/>
            <a href="https://www.facebook.com/GEPWNAGE/" target="_blank"
               class="text-muted">
                <i class="fa fa-fw fa-facebook"></i> Facebook
            </a>
            <br/>
            <a href="https://steamcommunity.com/groups/gepwnage" target="_blank"
               class="text-muted">
                <i class="fa fa-fw fa-steam"></i> Steam
            </a>
            <br/>
            <a href="irc://gewis.nl/gepwnage"
               class="text-muted">
                <i class="fa fa-fw fa-terminal"></i> IRC
            </a>
        </div>
        <div class="col-md-4 my-3">
            <h4>Sponsored by</h4>
            <div class="carousel slide" data-interval="3000" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($sponsors as $sponsor)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ asset('storage/sponsor/' . $sponsor->slug . '.png') }}"
                                 alt="{{ $sponsor->name }}"
                                 class="d-block w-100">
                        </div>
                    @endforeach
                    <a href="mailto:lan@gepwnage.nl" class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('images/yourlogohere.jpg') }}"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
