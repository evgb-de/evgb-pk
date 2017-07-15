<?php $view->script('sermon', 'sermon:js/admin.js', 'vue') ?>
<div id="sermon-table" class="uk-form">
  <button class="uk-button uk-button-primary uk-align-right" @click="save">{{ 'Save' | trans }}</button>

  <h2>{{ '{0} Sermons|one: One Sermon|more: %count% Sermons' | transChoice entries.length {count:entries.length} }}</h2>

  <form class="uk-width-large-1-1" @submit="add">
    <input class="uk-input-large uk-width-1-5" placeholder="{{ 'Preacher' | trans }}" v-model="newPreacher">
    <input class="uk-input-large uk-width-1-5" placeholder="{{ 'Biblechapter' | trans }}" v-model="newBiblechapter">
    <input class="uk-input-large uk-width-1-5" placeholder="{{ 'Description' | trans }}" v-model="newDescription">
    <button class="uk-button" @click="add">{{ 'Add' | trans }}</button>
  </form>

  <hr>

  <div class="uk-alert" v-if="!entries.length">{{ 'You can add your first task using the input fields above. Go ahead!' | trans }}</div>
  <div class="uk-overflow-container uk-width-1-1">
    <table class="uk-table-striped uk-table-hover uk-width-1-1" v-if="entries.length">
      <thead>
        <tr>
          <th class="uk-width-1-4">{{ 'Preacher' | trans }}</th>
          <th class="uk-width-1-4">{{ 'Biblechapter' | trans }}</th>
          <th class="uk-width-1-4">{{ 'Description' | trans }}</th>
          <th class="uk-width-1-4 uk-text-left">{{ 'Actions' | trans }}</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="entry in entries" :class="{'uk-text-muted': entry.hidden}">
          <td class="uk-text-center">{{ entry.preacher }}</td>
          <td class="uk-text-center">{{ entry.biblechapter }}</td>
          <td class="uk-text-center">{{ entry.description }}</td>
          <td class="uk-text-left">
            <button @click="toggle(entry)" class="uk-button">{{ entry.hidden ? "Unhide" : "Hide" | trans }}</button>
            <button @click="edit(entry)" class="uk-button"><i class="uk-icon-pencil"></i></button>
            <button @click="remove(entry)" class="uk-button uk-button-danger" v-if="entry.hidden"><i class="uk-icon-remove"></i></button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
