$(function () {
  var vm = new Vue({
    el: '#pkddl-table',
    data: {
      entries:              window.$data.config.entries,  
      newPreacher:          '',
      newBiblepassage:      '',
      newDescription:       '',
      newDate:              '',
      newLink:              '',
      newLinkDescription:   '',
      newFile:              '',
      isPreacherDanger:     false,
      isBiblepassageDanger: false,
      isDescriptionDanger:  false,
      isDateDanger:         false,
      idFileDanger:         false,
      editedEntry:          '',
    },

    methods: {
      save: function() {
        this.$http.post('admin/pkddl/save', { entries: this.entries }, function() {
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
        if(!this.newDate) { this.isDateDanger = true; } else { this.isDateDanger = false; }
        if(!this.newDate) { this.isDateDanger = true; } else { this.isDateDanger = false; }
        if (this.newPreacher && this.newDescription && this.newBiblepassage && this.newDate && this.editedEntry){
          this.entries.push({
            preacher:     this.newPreacher,
            biblepassage: this.newBiblepassage,
            description:  this.newDescription,
            date:         this.newDate,
            file:         this.newFile,
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
            file:         this.newFile,
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
        this.newFile              = '';
      },

      edit: function(entry) {
        this.newPreacher     = entry.preacher;
        this.newBiblepassage = entry.biblepassage;
        this.newDescription  = entry.description;
        this.newDate         = entry.date;
        this.newFile         = entry.file;
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
          this.newLinkDescription = '';
          this.newLink = '';
        }
      }
    }
  })
});
