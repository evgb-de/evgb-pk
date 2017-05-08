$(function () {
    var vm = new Vue({
        el: '#sermon-table',

        data: {
            entries: window.$data.config.entries,
            newDescription: ''
        },

        methods: {
          add: function(e) {
            e.preventDefault();
            if(!this.newDescription) return;

            this.entries.push({
              preacher: this.newPreacher,
              description: this.newDescription,
              hidden: false
            });

            this.newAttachment = '';
            this.newPreacher = '';
            this.newDescription = '';
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
