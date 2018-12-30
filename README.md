# Casa
*A powerful and flexible home page.*

**Casa** is an easily customizable, feature-rich landing page designed to be used as a browser's "home" page. It has been designed with keyboard usage in mind, with all core functionality being accessible in a few keystrokes.

## Features

Please refer to the [official site](https://shuga.co/casa/) for a list of Casa's features.

## Usage

Casa's UI is straight forward. Type your query in the Casa search box (which supports navigating to URLs and DuckDuckGo search), press the Enter key to search, and click the bookmarks/auto-complete queries to visit them. It also has some more hidden features such as:
- Type in an alias (as set by the `shortcut` property in the `data` object) to select a bookmark.
- Click the greeter to pick a new one.
- Press the up or down arrow keys to select the left or right auto-complete query.
- Click the currently playing song to search for it on DuckDuckGo.

## Set-Up

### Automatically (recommended)
**Use the Casa set-up wizard [here](#).** It should walk you through the entire process, generate all the needed configuration files, and put them in the correct place. It also will remove bloat for unwanted featured (if requested).

### Manually
You will probably need a web server. [Here's how you can set one up!](https://www.maketecheasier.com/setup-local-web-server-all-platforms/)
- Casa does support [GitHub Pages](https://pages.github.com/), but not with auto-complete or iTunes integration (which require `api.php`).

1. **Download `index.html`**.
2. **Change your skin.** This can be done by changing the default value of the `openskin` variable to an [OpenSkin](https://github.com/Shugabuga/OpenSkinJS)-compatible skin.
   - An example bare-bones skin can be found below.
   
   ```json
   var openskin = {
          "name": "Casa Dark",
          "logo": "https://shuga.co/casa/CasaDark.png",
          "author": "Shuga",
          "description": "The default dark mode for the Casa home page.",
          "styles": [
            {
                "containerBackground": "background:#222222",
                "label": "color:#eeeeee",
                "caption": "color:grey",
                "button": "background:#454545",
                "searchbar": "background:#434343;color:#eeeeee",
                "icon": "color:darkgrey",
                "buttonHover" :"background:#545454!important",
                "buttonFocus": "background:#343434!important",
                "searchbarFocus": "background:#323232!important",
                "greenText": "color:green",
                "blueText": "color:teal"
            }
          ]
        }
    ```
    - Please note that properties listed under the application name (`casa`) will be ignored. Most skin designers don't have to worry about this.
3. **Add your bookmarks.** Bookmarks are stored in the `data` variable, which is an object that hosts all the bookmarks and their data.
     - Bookmarks provide all alias data to the Casa search bar in the `shortcut` array. If you want an alias but not have it appear as a bookmark, set `is_visible` to `false`.
     - `icon` entries are [Font Awesome](https://origin.fontawesome.com/icons?d=gallery&m=free) class names. Although Casa's set-up wizard does not tell you, you can opt to have Unicode characters to be the bookmark's `icon` if you set `is_fa` to `false`.
     - An example bookmark data variable can be found below:
     ```json
     var data = {
          "Twitter": {
              "url": "https://mobile.twitter.com",
              "icon": "fab fa-twitter",
              "is_fa": "true",
              "is_visible": "true",
              "shortcut": ["t","tw","twitter"]
          },
          "Reddit": {
              "url": "https://old.reddit.com",
              "icon": "fab fa-reddit",
              "is_fa": "true",
              "is_visible": "true",
              "shortcut": ["r","re","rd","reddit"]
          },
          "MyAnimeList": {
              "url": "https://myanimelist.net/animelist/HeyItsShuga",
              "icon": "ツ",
              "is_fa": "false",
              "is_visible": "true",
              "shortcut": ["mal","my_anime_list","myanimelist","weeb"]
          }
      }
      ```
4. **Add custom phrases.** The rotation for greeters are stored in the `phrases` array.
5. **Toggle iTunes integration.** If you have macOS and want iTunes integration, download `api.php`. If you don't want iTunes integration but want auto-complete functionality, download `api_lite.php` and rename it `api.php`.
- **Note: `api.php` and `index.html` must be in the same folder!**
6. **Toggle auto-complete.** If `api.php` is not going to be used, set `isAutoComplete` to `false` to disable auto-complete.
7. **You're done!** Casa should be set up and ready to go!

## Questions?

Let me know on [Twitter](https://twitter.com/HeyItsShuga).
