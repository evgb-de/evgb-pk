<?php $view->script('sermon', 'sermon:js/sermon.js', 'vue') ?>



<div id="sermon-table" class="uk-form" >
  <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
    <div class="uk-flex uk-flex-middle uk-flex-wrap" data-uk-margin>
      <h2 class="uk-margin-remove">{{ 'Sermons'  }}</h2>
      <div class="pk-search">
        <div class="uk-search">
          <input class="uk-search-field" type="text" v-model="config.filter.search" debounce="300">
        </div>
      </div>
    </div>
    <div data-uk-margin>
      <a class="uk-button uk-button-primary" :href="$url.route('admin/sermon/edit')">{{ 'Add User'  }}</a>
    </div>
  </div>
  <div class="uk-overflow-container">
    <table class="uk-table uk-table-hover uk-table-middle">
      <thead>
        <tr>
          <th class="pk-table-width-minimum"><input type="checkbox" v-check-all:selected.literal="input[name=id]" number></th>
          <th colspan="2" v-order:username="config.filter.order">Preacher</th>
          <th class="pk-table-width-100 uk-text-center">
            {{ 'Description'  }}
          </th>
          <th class="pk-table-width-200" v-order:email="config.filter.order">
            {{ 'Email'  }}
          </th>
          <th class="pk-table-width-100">
            {{ 'Audio'  }}
          </th>
        </tr>
      </thead>
      <tbody>
        <tr class="check-item" v-for="entry in entries">
          <td><input type="checkbox" name="id" :value="entry.id"></td>
          <td class="pk-table-width-minimum">
            <a href="#" :class="{
              'pk-icon-circle-success': entry.status,
              'pk-icon-circle-danger': !entry.status
            }" @click="toggleStatus(entry)"></a>
          </td>
          <td class="uk-text-nowrap">
            <a :href="$url.route('admin/sermon/edit', { id: entry.id })">{{ entry.preacher }}</a>
            <div class="uk-text-muted">{{ entry.preacher }}</div>
          </td>
          <td class="uk-text-center">
            <div class="uk-text-muted">
              {{ entry.description }}
            </div>
          </td>
          <td>
            <a :href="{{ entry.audio }}">{{ entry.audio }}</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
