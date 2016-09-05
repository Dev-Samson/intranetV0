$(document).ready(function(){
   
        var $collectionHolderStudy;

        // setup an "add a tag" link
        var $addStudyLink = $('<a href="#" class="add_study_link"><span class="fa  fa-plus-square"></span></a>');
        var $newStudyLinkLi = $('<li></li>').append($addStudyLink);

        jQuery(document).ready(function() {
            // Get the ul that holds the collection of tags
            $collectionHolderStudy = $('ul.studies');

            // add the "add a tag" anchor and li to the tags ul
            $collectionHolderStudy.append($newStudyLinkLi);

            // count the current form inputs we have (e.g. 2), use that as the new
            // index when inserting a new item (e.g. 2)
            $collectionHolderStudy.data('index', $collectionHolderStudy.find(':input').length);

            $addStudyLink.on('click', function(e) {
                // prevent the link from creating a "#" on the URL
                e.preventDefault();

                // add a new tag form (see next code block)
                addForm($collectionHolderStudy, $newStudyLinkLi);
            });
        });
        
        
        var $collectionHolderExperience;

        // setup an "add a tag" link
        var $addExperienceLink = $('<a href="#" class="add_experience_link"><span class="fa  fa-plus-square"></span></a>');
        var $newExperienceLinkLi = $('<li></li>').append($addExperienceLink);

        jQuery(document).ready(function() {
            // Get the ul that holds the collection of tags
            $collectionHolderExperience = $('ul.experiences');

            // add the "add a tag" anchor and li to the tags ul
            $collectionHolderExperience.append($newExperienceLinkLi);

            // count the current form inputs we have (e.g. 2), use that as the new
            // index when inserting a new item (e.g. 2)
            $collectionHolderExperience.data('index', $collectionHolderExperience.find(':input').length);

            $addExperienceLink.on('click', function(e) {
                // prevent the link from creating a "#" on the URL
                e.preventDefault();

                // add a new tag form (see next code block)
                addForm($collectionHolderExperience, $newExperienceLinkLi);
            });
        });
        
        
        var $collectionHolderLanguage;

        // setup an "add a tag" link
        var $addLanguageLink = $('<a href="#" class="add_language_link"><span class="fa  fa-plus-square"></span></a>');
        var $newLanguageLinkLi = $('<li></li>').append($addLanguageLink);

        jQuery(document).ready(function() {
            // Get the ul that holds the collection of tags
            $collectionHolderLanguage = $('ul.languages');

            // add the "add a tag" anchor and li to the tags ul
            $collectionHolderLanguage.append($newLanguageLinkLi);

            // count the current form inputs we have (e.g. 2), use that as the new
            // index when inserting a new item (e.g. 2)
            $collectionHolderLanguage.data('index', $collectionHolderLanguage.find(':input').length);

            $addLanguageLink.on('click', function(e) {
                // prevent the link from creating a "#" on the URL
                e.preventDefault();

                // add a new tag form (see next code block)
                addForm($collectionHolderLanguage, $newLanguageLinkLi);
            });
        });

        
        
        var $collectionHolderProjectPerso;

        // setup an "add a tag" link
        var $addProjectPersoLink = $('<a href="#" class="add_projectperso_link"><span class="fa  fa-plus-square"></span></a>');
        var $newProjectPersoLinkLi = $('<li></li>').append($addProjectPersoLink);

        jQuery(document).ready(function() {
            // Get the ul that holds the collection of tags
            $collectionHolderProjectPerso = $('ul.personnalProjects');

            // add the "add a tag" anchor and li to the tags ul
            $collectionHolderProjectPerso.append($newProjectPersoLinkLi);

            // count the current form inputs we have (e.g. 2), use that as the new
            // index when inserting a new item (e.g. 2)
            $collectionHolderProjectPerso.data('index', $collectionHolderProjectPerso.find(':input').length);

            $addProjectPersoLink.on('click', function(e) {
                // prevent the link from creating a "#" on the URL
                e.preventDefault();

                // add a new tag form (see next code block)
                addForm($collectionHolderProjectPerso, $newProjectPersoLinkLi);
            });
        });

        function addForm($collectionHolder, $newLinkLi) {
            // Get the data-prototype explained earlier
            var prototype = $collectionHolder.data('prototype');

            // get the new index
            var index = $collectionHolder.data('index');

            // Replace '__name__' in the prototype's HTML to
            // instead be a number based on how many items we have
            var newForm = prototype.replace(/__name__/g, index);

            // increase the index with one for the next item
            $collectionHolder.data('index', index + 1);

            // Display the form in the page in an li, before the "Add a tag" link li
            var $newFormLi = $('<li></li>').append(newForm);
            $newLinkLi.before($newFormLi);
        }
         
});