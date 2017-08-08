<?php $view->script('sermon', 'sermon:js/admin.js', 'vue') ?>
<script type="text/javascript" src="/app/assets/uikit/js/components/datepicker.min.js"></script>
<div id="sermon-table" class="uk-form">
  <button class="uk-button uk-button-primary uk-align-right" @click="save">{{ 'Save' | trans }}</button>

  <h2>{{ '{0} Sermons|one: One Sermon|more: %count% Sermons' | transChoice entries.length {count:entries.length} }}</h2>

  <form class="uk-width-large-1-1 uk-form" @submit="add">
    <input class="uk-input-large uk-width-1-6"  v-bind:class="{ 'uk-form-danger': isPreacherDanger }" placeholder="{{ 'Preacher' | trans }}" v-model="newPreacher">
    <input class="uk-input-large uk-width-1-6"  v-bind:class="{ 'uk-form-danger': isBiblepassageDanger }" placeholder="{{ 'Bible passage' | trans }}" v-model="newBiblepassage">
    <input class="uk-input-large uk-width-1-6"  v-bind:class="{ 'uk-form-danger': isDescriptionDanger }" placeholder="{{ 'Description' | trans }}" v-model="newDescription">
    <input class="uk-input-large uk-width-1-6"  v-bind:class="{ 'uk-form-danger': isDateDanger }" placeholder="{{ 'Date' | trans }}" type="text" data-uk-datepicker="{format:'DD.MM.YYYY'}" v-model="newDate">
    <button class="uk-button" @click="add">{{ 'Add' | trans }}</button>
  </form>

  <hr>

  <div class="uk-alert" v-if="!entries.length">{{ 'You can add your first task using the input fields above. Go ahead!' | trans }}</div>
  <div class="uk-overflow-container uk-width-1-1">
    <table class="uk-table-striped uk-table-hover uk-width-1-1" v-if="entries.length">
      <thead>
        <tr>
          <th class="uk-width-1-8">{{ 'Preacher' | trans }}</th>
          <th class="uk-width-1-8">{{ 'Bible passage' | trans }}</th>
          <th class="uk-width-1-8">{{ 'Description' | trans }}</th>
          <th class="uk-width-1-8">{{ 'Date' | trans }}</th>
          <th class="uk-width-2-8">{{ 'Files' | trans }}</th>
          <th class="uk-width-2-8 uk-text-left">{{ 'Actions' | trans }}</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="entry in entries" :class="{'uk-text-muted': entry.hidden}">
          <td class="uk-text-center">{{ entry.preacher }}</td>
          <td class="uk-text-center">{{ entry.biblepassage }}</td>
          <td class="uk-text-center">{{ entry.description }}</td>
          <td class="uk-text-center">{{ entry.date }}</td>
          <td class="uk-text-left">
            <a v-for="link in entry.links" class="uk-button" href="{{ link.link }}">{{ link.description | trans }}</a>
          </td>
          <td class="uk-text-left">
            <input class="uk-input-small" placeholder="{{ 'Description' | trans }}" v-model="newLinkDescription" v-if="entry.hiddenLink">
            <input class="uk-input-small" placeholder="{{ 'Link' | trans }}" v-model="newLink" v-if="entry.hiddenLink">
            <button @click="toggleLink(entry)" class="uk-button" v-if="!entry.hiddenLink"><i class="uk-icon-plus"></i></button>
            <button @click="addLink(entry)" class="uk-button" v-if="entry.hiddenLink"><i class="uk-icon-check"></i></button>

            <button @click="toggle(entry)" class="uk-button">{{ entry.hidden ? "Unhide" : "Hide" | trans }}</button>
            <button @click="edit(entry)" class="uk-button"><i class="uk-icon-pencil"></i></button>
            <button @click="remove(entry)" class="uk-button uk-button-danger" v-if="entry.hidden"><i class="uk-icon-remove"></i></button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
