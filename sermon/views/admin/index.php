<?php $view->script('sermon', 'sermon:js/sermon.js', 'vue') ?>

<div id="sermon-table" class="uk-form">
  <button class="uk-button uk-button-primary uk-align-right" @click="save">{{ 'Save' | trans }}</button>

  <h2>{{ '{0} Sermons|one: One Sermon|more: %count% Sermons' | transChoice entries.length {count:entries.length} }}</h2>

  <form class="uk-width-large-2-3" @submit="add">
    <input class="uk-input-large uk-width-3-4" placeholder="{{ 'Preacher' | trans }}" v-model="newPreacher">
    <input class="uk-input-large uk-width-3-4" placeholder="{{ 'Description' | trans }}" v-model="newDescription">
    <button class="uk-button" @click="add">{{ 'Add' | trans }}</button>
  </form>

  <hr>

  <div class="uk-alert" v-if="!entries.length">{{ 'You can add your first task using the input fields above. Go ahead!' | trans }}</div>

  <ul class="uk-list uk-list-line" v-if="entries.length">
    <li class="uk-text-large" v-for="entry in entries" :class="{'uk-text-muted': entry.hidden}">

      <span class="uk-align-right">
        <button @click="toggle(entry)" class="uk-button">{{ entry.hidden ? "Unhide" : "Hide" | trans }}</button>
        <button @click="remove(entry)" class="uk-button uk-button-danger" v-if="entry.hidden"><i class="uk-icon-remove"></i></button>
      </span>

      {{ entry.description }} | {{ entry.preacher }}
    </li>
  </ul>
</div>
