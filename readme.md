# Fever Filter

RSS feeds can be overwhelming. Let's tone down the noise. This filter will mark items as read that you do not want to see.

This is made for Shaun Inman's [Fever](http://feedafever.com)

## Usage

Say I want to only see updates from the Penny Arcade feed when they post a new comic, I can set up a filter to exclude their blog posts.

`filter("Penny Arcade",array("News Post:"));`


But what if I want to get rid of something from all the feeds? I have included a select all to do just that. With this line of code any sponsored post will be hidden.

`filter("*",array("Sponsor:","[Sponsor]"));`

## Installation

Just go to `functions/fun.core.php` and give it access to the MySQL database where Fever is located.

Then set up a CRON job to `curl` the `fever-filter.php`. The one below is set to run every five minutes.

`00,05,30,45 * * * * curl -L -s http://example.com/fever/filter/fever-filter.php`

## Wishlist

* Fever API support
* Cleaner code
* Regex support
* Shaun Inman to continue developing Fever ;)

## Thanks

* [ezSQL](https://github.com/jv2222/ezSQL)
* [Matthew Price](http://mattprice.me)