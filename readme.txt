=== KLEX ===
Contributors: Klaus Lyngsø
Donate link: http://www.msf.org/msfinternational/donations/ (Médecins Sans Frontières (MSF))
Tags: exif, photo, metadata
Requires at least: 2.0
Tested up to:  WordPress 2.9.2
Stable tag: 0.9

Show exif data directly from photos in your blog. This plugin examines the jpg or tiff photo for exif data and lets you display the interesting ones.

== Description ==

While other plugins gets the exif data from the WordPress database, KLEX get the data directly from the image file. This means that KLEX works on all photos that contains exif data, 
and not only photos uploaded to your blog using WordPress upload functionality. The photo does not even have to be stored locally. KLEX can examine any jpg or tiff photo, if you provide the url.

Insert the KLEX tag (format: [KLEX pic="http://www.example.com/image.jpg"]) and it will be replaced by something like this in your WordPress post: 
Canon EOS 5D Mark II Lens: EF24-105mm f/4L IS USM f/4.0 Shutter: 1/125 sec Focal Length: 70 mm ISO: 3200

Be aware not all camera makes provides the exif data that shows which lens was used. As an example exif from Nikon will look something like this: 
NIKON D5000 f/11.0 Shutter: 1/125 sec Focal Length: 125 mm ISO: 100

Exif data describes the make, model and settings of the camera at the time the photo was taken and is of great interest to most photo enthusiasts. KLEX shows only 
the most relevant exif data (Camera model, lens (when available), aperture, shutter speed, focal length and ISO) for two reasons. We don't want to drown the most interesting exif information in less 
relevant data and to avoid exif data taking up more space than the image itself.


== Installation ==


1. Upload `KLEX.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place [KLEX pic="http://www.example.com/image.jpg"] in your post where you would like KLEX to display the exif data.
*Replace http://www.example.com/image.jpg with the location of the image, you would like to show exif data for.

== Frequently Asked Questions ==

= Why not let KLEX find all images in a post and insert the exif automaticly? =
Two reasons:
1. KLEX has no chance of knowing where or how you want to display the data
2. You may display a thumb on your page, that does not contain exif and point KLEX provide the EXIF from the original image. An automated version would not give this option.

= Why can't I select what Exif data are relevant to my blog's readers? =

I am sure you can (just not with this plugin). I just developed a quick solution for my blog and decided to share it.

= Will the be future versios with more options and better userinterface? =

Maybe. Depends on interest shown and if anyone else is willing to contribute to the solution. (Feel free to email lyngsoe@gmail.com and express wishes and offers to help)

= Why do get I some kind of error message in the top of my blog after inserting a KLEX-tag and how do I solve it? =
Most common reasons are images without exif data or wrong url to image in KLEX tag. 
Solution: Study the error message to decide if the wrong file is being accessed or if the file jus have no exif data. Correct or remove the KLEX tag that causes the problem. 

= Why is this version 0.9 and not 1.0? =
KLEX never makes the blog crash, but error messages, like when a wrong url or an image without exif data is provided, are not always handled elegantly. I orignally devoloped this plugin
for my own use on my own WordPress photoblog only and decided to share. I have no idea how many will be interested in this plugin and for this reason I gave sharing priority over refining 
the code and let the demand decide if it will ever get refined.

== Screenshots ==

No screenshots available.

== Changelog ==

= 0.9 =
This is the first version of KLEX

== Upgrade Notice ==

= 1.0 =
Upgrade notices describe the reason a user should upgrade.  No more than 300 characters.


== A brief Markdown Example ==

[KLEX pic="http://www.example.com/image.jpg"]

Current wishlist:

1. More user friendly error handling 
2. More userfriendly way to add the KLEX tags to the posts, like a button in WordPress' media control panel.
3. Your wish?

Reason for not implementning the above wishes: At time of release I am the only user and its not worth looking into if no one else is going to use it

Known bugs:

None

Bugreports are welcome at lyngsoe@gmail.com, but no promises of fixing them are made up front.

Here's a link to [WordPress](http://wordpress.org/ "WordPress")

