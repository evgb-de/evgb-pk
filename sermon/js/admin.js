$(function () {
  var vm = new Vue({
    el: '#sermon-table',

    data: {
      entries:              window.$data.config.entries,
      newPreacher:          '',
      newBiblepassage:      '',
      newDescription:       '',
      newDate:              '',
      isPreacherDanger:     false,
      isBiblepassageDanger: false,
      isDescriptionDanger:  false,
      isDateDanger:         false,
    },

    methods: {
      add: function(e) {
        e.preventDefault();
        if(!this.newPreacher ) {
          this.isPreacherDanger = true;
        } else {
          this.isPreacherDanger = false;
        }
        if(!this.newDescription) {
          this.isDescriptionDanger = true;
        } else {
          this.isDescriptionDanger = false;
        }
        if(!this.newBiblepassage) {
          this.isBiblepassageDanger = true;
        } else {
          this.isBiblepassageDanger = false;
        }
        if (!this.newDate) {
          this.isDateDanger = true;
        } else {
          this.isDateDanger = false;
        }
        if (this.newPreacher && this.newDescription && this.newBiblepassage && this.newDate){
          this.entries.push({
            preacher:     this.newPreacher,
            biblepassage: this.newBiblepassage,
            description:  this.newDescription,
            date:         this.newDate,
            hidden:       false,
          });

          this.newAttachment        = '';
          this.newPreacher          = '';
          this.newBiblepassage      = '';
          this.newDescription       = '';
          this.newDate              = '';
        }
      },

      edit: function(entry) {
        this.newPreacher     = entry.preacher;
        this.newBiblepassage = entry.Biblepassage;
        this.newDescription  = entry.description;
        this.newDate         = entry.date;

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
