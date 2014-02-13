smartlingon
===========

A set of scripts to import OLX's translations into Smartling and to extract them back.

### Initializing Smartling with all the keys

```
php init.php en_US/LC_MESSAGES/messages.po > olx.po
```

and then upload `olx.po` to Smartling.

### Loading all translations

```
for i in *_*
do php upload.php en_US/LC_MESSAGES/messages.po $i/LC_MESSAGES/messages.po > $i.po
done
```

and then upload all `*.po` to Smartling.

### Importing all translations back

Download all translations from Smartling and

```
for i in *_*.po
do php download.php $i > `basename $i .po`/LC_MESSAGES/message.po
done
```
