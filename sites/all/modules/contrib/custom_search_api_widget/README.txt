Custom Search API Widget
========================

This project is just starting, so please be patient. 

This module is a replacement for the custom search module (http://www.drupal.org/project/custom_search) for sites which use panels instead of blocks. The module creates a panels content type which can be added to any panels page, and linked in a similar style to the custom search blocks module to a search page provided by search api. 

The module also allows taxonomy facets to be exposed as select lists which are then opened as facets when the search is performed.  Currently, it only supports taxonomy terms and will automatically choose the root level terms in a hierarchical taxonomy.

=======

The custom search form has 3 categories of settings:

1 - Search box which contains the following:
	Search box label
	Enter the label text for the search box.
	Search box default text
	This will change the default text inside the search form. Leave blank for no text.
        Search box hint text
	Search box size (default value is 15)
	Search box maximum length (default value is 128)
	Submit button text
	Enter the text for the submit button. (default value is "Search").

2 - Custom search paths which contains the following:

	Paths for each language, ex.
        
	en|search/site/[key]?f[0]=type:news 
	fr|recherche/site/[key]?f[0]=type:news

3 - Exposed field(s) which contains the following:

	Select one or more fields to be exposed in the widget - any taxonomy reference fields (using entity reference module)

	Label text (Enter the label text for the selector.)

	-Any- (Enter the text for "any" in the selector.)

INSTALLATION

1. Enable module

2. Edit a page within panels\

3. Select Add Content->Widgets->Custom Search Widget
