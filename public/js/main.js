$(document).ready(function () {

    var url = 'https://api.steemjs.com/get_discussions_by_created?query={"tag":"steemjet", "limit": "100"}';

    jQuery.ajax({
            type: "GET",
            url: url,

            success: function (response) {

                var post = response;

                $.each(post,function(key,value){

                  var body = jQuery.trim(value.body).substring(0, 600);
                  var img = "https://steemitimages.com/u/"+value.author+"/avatar";
                  var pending_payout = parseFloat(value.pending_payout_value);
                  var paid_out = parseFloat(value.total_payout_value) + parseFloat(value.curator_payout_value);
                  if (pending_payout != 0.00) {
                      var payout = pending_payout;
                  }else {
                      var payout = paid_out;
                  }
                  var tags = JSON.parse(value.json_metadata);

                  // Instantiate a new showdown converter object
                  var converter = new showdown.Converter();

                  // Set options
                  converter.setOption('metadata', 'true');
                  converter.setOption('backslashEscapesHTMLTags', 'true');
                  converter.setOption('requireSpaceBeforeHeadingText', 'true');
                  converter.setOption('simpleLineBreaks', 'true');
                  converter.setOption('disableForced4SpacesIndentedSublists', 'true');
                  converter.setOption('smartIndentationFix', 'true');
                  converter.setOption('literalMidWordAsterisks', 'true');
                  converter.setOption('literalMidWordUnderscores', 'true');
                  converter.setOption('excludeTrailingPunctuationFromURLs', 'true');
                  converter.setOption('simplifiedAutoLink', 'true');
                  converter.setOption('parseImgDimensions', 'true');
                  converter.setOption('omitExtraWLInCodeBlocks', 'true');
                  converter.setOption('noHeaderId', 'true');
                  converter.setOption('customizedHeaderId', 'true');
                  converter.setOption('ghCompatibleHeaderId', 'true');
                  converter.setOption('prefixHeaderId', 'true');
                  converter.setOption('rawPrefixHeaderId', 'true');
                  converter.setOption('rawHeaderId', 'true');
                  converter.setOption('headerLevelStart', 'true');
                  converter.setOption('excludeTrailingPunctuationFromURLs', 'true');
                  converter.setOption('strikethrough', 'true');
                  converter.setOption('tables', 'true');
                  converter.setOption('tablesHeaderId', 'true');

                  //converts markdown to html
                  body = converter.makeHtml(body);

                  body = body.replace(/(<([^>]+)>)/ig,"").replace(/<a(\s[^>]*)?>.*?<\/a>/ig,"").replace(/(?:https?|ftp):\/\/[\n\S]+/g,"").substr(0, 600) + '...';

                  // console.log(tags);

                  var mainpost = '<article class="question question-type-normal"><div class="span-top"></div><div class="span-inner"><h2 class="quest-h2"><a href="" class="question-a">'+value.title+'</a></h2><div class="question-inner"><div class="clearfix"></div><p class="question-desc">'+body+'...'+'</p><div class=""><img src="'+img+'" alt="profile-img" class="profile-img-dashboard img-responsive"><h4 class="username-dashboard">'+value.author+'</h4><h5 class="time-dashboard"> </h5><h5 class="comment-count"><i class="fa fa-comment" aria-hidden="true"></i>'+value.children+'</h5><h5 class="upvote-count"><i class="fa fa-heart" aria-hidden="true"></i>'+value.net_votes+'</h5><h5 class="payout-dashboard">$'+payout+'</h5></div></div></div></article>';

                  $('.loader').hide();

                  $('#holder-inner').append(mainpost);

                })

            },
            error: function (xhr) {
                //on error show error message
                console.log(xhr);
            },

        });
})
