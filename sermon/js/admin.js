$(function () {
    var vm = new Vue({
        el: '#sermon-table',

        data: {
            entries: window.$data.config.entries,
            newPreacher: '',
            newBiblechapter: '',
            newDescription: '',
        },

        methods: {
          add: function(e) {
            e.preventDefault();
            if(!this.newPreacher) return;
            if(!this.newDescription) return;
            if(!this.newBiblechapter) return;

            this.entries.push({
              preacher: this.newPreacher,
              biblechapter: this.newBiblechapter,
              description: this.newDescription,
              hidden: false,
            });

            this.newAttachment = '';
            this.newPreacher = '';
            this.newBiblechapter = '';
            this.newDescription = '';
          },

          edit: function(entry) {
            this.newPreacher = entry.preacher;
            this.newBiblechapter = entry.biblechapter;
            this.newDescription = entry.description;

            this.entries.$remove(entry);
          },

          toggle: function(entry) {
            entry.hidden = !entry.hidden;
          },

          remove: function(entry) {
            this.entries.$remove(entry);
          },

          save: function() {
            this.$http.post('admin/sermon/save', { entries: this.entries }, function() {
              UIkit.notify(vm.$trans('Saved.'), '');
            }).error(function(data) {
              UIkit.notify(data, 'danger');
            });
          }
        }
      })
    });
