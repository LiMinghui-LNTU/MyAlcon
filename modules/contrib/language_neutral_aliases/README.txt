Language neutral aliases
========================

Make URL aliases language independent.

Drupal 8 contains advanced URL alias management, allowing for URL
aliases dependent on the currently selected language. This can
however, depending on the language setup of the site be confusing for
users that often expect URL aliases to be global.

This module decouples URL aliases from the language system, making URL
aliases independent of the language of the session (user selected,
site configured) and content (node language, etc).

If the module is installed on an existing site, all URL aliases that
is not language neutral will be totally hidden. The paths will not
work, they will not show up on node edit and they will not be listed
in the URL aliases admin pages. But they can be resurrected by
uninstalling the module.

Note that if using translated content, the "URL alias" field must not
be translated. It is not possible to create unique (language neutral)
aliases per translation due to the way aliases and translations work
together.

For permanent usage, it's recommended to either clean out non-language
neutral aliases before installing the module, or run "UPDATE url_alias
SET langcode = 'und' WHERE langcode <> 'und';" in the database, to
bulk change them to language neutral.
