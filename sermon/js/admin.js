$(function () {
  var vm = new Vue({
    el: '#sermon-table',

    data: {
      entries:              window.$data.config.entries,
      newPreacher:          '',
      newBiblepassage:      '',
      newDescription:       '',
      newDate:              '',
      newLink:              '',
      newLinkDescription:   '',
      isPreacherDanger:     false,
      isBiblepassageDanger: false,
      isDescriptionDanger:  false,
      isDateDanger:         false,
      editedEntry:          '',
    },

    methods: {
      save: function() {
        this.$http.post('admin/sermon/save', { entries: this.entries }, function() {
          UIkit.notify(vm.$trans('Saved.'), '');
        }).error(function(data) {
          UIkit.notify(data, 'danger');
        });
      },

      add: function(e) {
        e.preventDefault();
        if(!this.newPreacher ) { this.isPreacherDanger = true;} else { this.isPreacherDanger = false; }
        if(!this.newDescription) { this.isDescriptionDanger = true; } else { this.isDescriptionDanger = false; }
        if(!this.newBiblepassage) { this.isBiblepassageDanger = true; } else { this.isBiblepassageDanger = false; }
        if (!this.newDate) { this.isDateDanger = true; } else { this.isDateDanger = false; }

        if (this.newPreacher && this.newDescription && this.newBiblepassage && this.newDate && this.editedEntry){
          this.entries.push({
            preacher:     this.newPreacher,
            biblepassage: this.newBiblepassage,
            description:  this.newDescription,
            date:         this.newDate,
            links:        this.editedEntry.links,
            hidden:       this.editedEntry.hidden,
            hiddenLink:   false,
          })
          this.entries.$remove(this.editedEntry);
          this.editedEntry = '';
        } else if (this.newPreacher && this.newDescription && this.newBiblepassage && this.newDate) {
          this.entries.push({
            preacher:     this.newPreacher,
            biblepassage: this.newBiblepassage,
            description:  this.newDescription,
            date:         this.newDate,
            links:        [{description: 'dummy', link: 'http://dummy.com'}],
            hidden:       false,
            hiddenLink:   false,
          })
        }
        this.newAttachment        = '';
        this.newPreacher          = '';
        this.newBiblepassage      = '';
        this.newDescription       = '';
        this.newDate              = '';
      },

      edit: function(entry) {
        this.newPreacher     = entry.preacher;
        this.newBiblepassage = entry.biblepassage;
        this.newDescription  = entry.description;
        this.newDate         = entry.date;
        this.editedEntry     = entry;
      },

      toggle: function(entry) {
        entry.hidden = !entry.hidden;
      },

      remove: function(entry) {
        this.entries.$remove(entry);
      },

      toggleLink: function(entry) {
        entry.hiddenLink = !entry.hiddenLink;
      },

      addLink: function(entry) {
        if (this.newLinkDescription && this.newLink){
          entry.links.push({
            description:  this.newLinkDescription,
            link:         this.newLink,
          });
          entry.hiddenLink = false;

          /*this.entries.push({
            preacher:     entry.preacher,
           biblepassage: entry.biblepassage,
            description:  entry.description,
            date:         entry.date,
            links:        ll,
            hidden:       entry.hidden,
            hiddenLink:   false,
          });
           this.entries.$remove(entry);*/
          this.newLinkDescription = '';
          this.newLink = '';
        }
      }
    }
  })
});
