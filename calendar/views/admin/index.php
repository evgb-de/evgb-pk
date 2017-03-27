<?php $view->script('calendar', 'calendar:js/calendar.js', 'vue') ?>



<div id="calendar" >
    <ul >
            <li v-for="entry in entries" :class="{'uk-text-muted' : entry.property">
                {{ entry.name }}
            </li>
    </ul>
</div>