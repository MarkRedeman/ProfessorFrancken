<div class="agenda">
    <h3 class="section-header agenda-header">
        Agenda
    </h3>
    <ul class="agenda-list list-unstyled">
        @foreach ($activities as $activity)
            @include('./homepage._agenda-item', ['activity' => $activity])
        @endforeach
        <li class="agenda-item d-flex d-flex align-items-center">
            <div class="agenda-item__date align-self-start">
                <h5 class="agenda-item__date-day">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </h5>
            </div>

            <div class="agenda-item__body">
                <a href="https://calendar.google.com/calendar/ical/g8f50ild2kdf49bgathcdhvcqc%40group.calendar.google.com/public/basic.ics">
                    <h5 class="agenda-item__header">Download our ical</h5>
                    <p class="agenda-item__description">
                        Upload our agenda to your own by downloading our ical
                    </p>
                </a>
            </div>
        </li>
    </ul>
</div>
