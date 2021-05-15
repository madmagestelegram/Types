<?php declare(strict_types=1);

namespace MadmagesTelegram\Types;

abstract class Client {

    /**
     * Method call handler
     *
     * @param string $method
     * @param array  $parameters
     * @return mixed
     */
    abstract public function _apiCall(string $method, array $parameters);


    /**
     * https://core.telegram.org/bots/api#getupdates
     *
     * Use this method to receive incoming updates using long polling (wiki). An Array of Update objects is returned. 
     *
     * @param int|null $offset
     *        Identifier of the first update to be returned. Must be greater by one than the highest among the identifiers of 
     * previously received updates. By default, updates starting with the earliest unconfirmed update are returned. An update 
     * is considered confirmed as soon as getUpdates is called with an offset higher than its update_id. The negative 
     * offset can be specified to retrieve updates starting from -offset update from the end of the updates queue. All 
     * previous updates will forgotten. 
     *
     * @param int|null $limit
     *        Limits the number of updates to be retrieved. Values between 1-100 are accepted. Defaults to 100. 
     *
     * @param int|null $timeout
     *        Timeout in seconds for long polling. Defaults to 0, i.e. usual short polling. Should be positive, short polling 
     * should be used for testing purposes only. 
     *
     * @param string[]|null $allowedUpdates
     *        A JSON-serialized list of the update types you want your bot to receive. For example, specify [“message”, 
     * “edited_channel_post”, “callback_query”] to only receive updates of these types. See Update for a complete list of available 
     * update types. Specify an empty list to receive all update types except chat_member (default). If not specified, the 
     * previous setting will be used.Please note that this parameter doesn't affect updates created before the call to the 
     * getUpdates, so unwanted updates may be received for a short period of time. 
     *
     * @return mixed
     */
    public function getUpdates(
        int $offset = null,
        int $limit = null,
        int $timeout = null,
        array $allowedUpdates = null
    )
    {
        $requestParameters = [
            'offset' => $offset,
            'limit' => $limit,
            'timeout' => $timeout,
            'allowed_updates' => $allowedUpdates,
        ];

        return $this->_apiCall('getUpdates', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setwebhook
     *
     * Use this method to specify a url and receive incoming updates via an outgoing webhook. Whenever there is an update for 
     * the bot, we will send an HTTPS POST request to the specified url, containing a JSON-serialized Update. In case of an unsuccessful request, we will give up after a reasonable amount of attempts. Returns True on 
     * success. If you'd like to make sure that the Webhook request comes from Telegram, we recommend using a secret path in the URL, 
     * e.g. https://www.example.com/&lt;token&gt;. Since nobody else knows your bot's token, you can be 
     * pretty sure it's us. 
     *
     * @param string $url
     *        HTTPS url to send updates to. Use an empty string to remove webhook integration 
     *
     * @param Type\InputFile|null $certificate
     *        Upload your public key certificate so that the root certificate in use can be checked. See our self-signed guide 
     * for details. 
     *
     * @param string|null $ipAddress
     *        The fixed IP address which will be used to send webhook requests instead of the IP address resolved through DNS 
     *
     * @param int|null $maxConnections
     *        Maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery, 1-100. Defaults 
     * to 40. Use lower values to limit the load on your bot's server, and higher values to increase your bot's throughput. 
     *
     * @param string[]|null $allowedUpdates
     *        A JSON-serialized list of the update types you want your bot to receive. For example, specify [“message”, 
     * “edited_channel_post”, “callback_query”] to only receive updates of these types. See Update for a complete list of available 
     * update types. Specify an empty list to receive all update types except chat_member (default). If not specified, the 
     * previous setting will be used.Please note that this parameter doesn't affect updates created before the call to the 
     * setWebhook, so unwanted updates may be received for a short period of time. 
     *
     * @param bool|null $dropPendingUpdates
     *        Pass True to drop all pending updates 
     *
     * @return mixed
     */
    public function setWebhook(
        string $url,
        Type\InputFile $certificate = null,
        string $ipAddress = null,
        int $maxConnections = null,
        array $allowedUpdates = null,
        bool $dropPendingUpdates = null
    )
    {
        $requestParameters = [
            'url' => $url,
            'certificate' => $certificate,
            'ip_address' => $ipAddress,
            'max_connections' => $maxConnections,
            'allowed_updates' => $allowedUpdates,
            'drop_pending_updates' => $dropPendingUpdates,
        ];

        return $this->_apiCall('setWebhook', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#deletewebhook
     *
     * Use this method to remove webhook integration if you decide to switch back to getUpdates. Returns True on success. 
     *
     * @param bool|null $dropPendingUpdates
     *        Pass True to drop all pending updates 
     *
     * @return mixed
     */
    public function deleteWebhook(
        bool $dropPendingUpdates = null
    )
    {
        $requestParameters = [
            'drop_pending_updates' => $dropPendingUpdates,
        ];

        return $this->_apiCall('deleteWebhook', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getwebhookinfo
     *
     * Use this method to get current webhook status. Requires no parameters. On success, returns a WebhookInfo object. If the bot is using getUpdates, will return an object with the url 
     * field empty. 
     *
     * @return mixed
     */
    public function getWebhookInfo(
    )
    {
        $requestParameters = [
        ];

        return $this->_apiCall('getWebhookInfo', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getme
     *
     * A simple method for testing your bot's auth token. Requires no parameters. Returns basic information about the bot 
     * in form of a User object. 
     *
     * @return mixed
     */
    public function getMe(
    )
    {
        $requestParameters = [
        ];

        return $this->_apiCall('getMe', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#logout
     *
     * Use this method to log out from the cloud Bot API server before launching the bot locally. You must 
     * log out the bot before running it locally, otherwise there is no guarantee that the bot will receive updates. After a 
     * successful call, you can immediately log in on a local server, but will not be able to log in back to the cloud Bot API server for 10 
     * minutes. Returns True on success. Requires no parameters. 
     *
     * @return mixed
     */
    public function logOut(
    )
    {
        $requestParameters = [
        ];

        return $this->_apiCall('logOut', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#close
     *
     * Use this method to close the bot instance before moving it from one local server to another. You need to delete the 
     * webhook before calling this method to ensure that the bot isn't launched again after server restart. The method will return 
     * error 429 in the first 10 minutes after the bot is launched. Returns True on success. Requires no parameters. 
     *
     * @return mixed
     */
    public function close(
    )
    {
        $requestParameters = [
        ];

        return $this->_apiCall('close', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendmessage
     *
     * Use this method to send text messages. On success, the sent Message is returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param string $text
     *        Text of the message to be sent, 1-4096 characters after entities parsing 
     *
     * @param string|null $parseMode
     *        Mode for parsing entities in the message text. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $entities
     *        List of special entities that appear in message text, which can be specified instead of parse_mode 
     *
     * @param bool|null $disableWebPagePreview
     *        Disables link previews for links in this message 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param int|null $replyToMessageId
     *        If the message is a reply, ID of the original message 
     *
     * @param bool|null $allowSendingWithoutReply
     *        Pass True, if the message should be sent even if the specified replied-to message is not found 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove reply keyboard or to force a reply from the user. 
     *
     * @return mixed
     */
    public function sendMessage(
        $chatId,
        string $text,
        string $parseMode = null,
        array $entities = null,
        bool $disableWebPagePreview = null,
        bool $disableNotification = null,
        int $replyToMessageId = null,
        bool $allowSendingWithoutReply = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => $parseMode,
            'entities' => $entities,
            'disable_web_page_preview' => $disableWebPagePreview,
            'disable_notification' => $disableNotification,
            'reply_to_message_id' => $replyToMessageId,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendMessage', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#forwardmessage
     *
     * Use this method to forward messages of any kind. Service messages can't be forwarded. On success, the sent Message is returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param int|string $fromChatId
     *        Unique identifier for the chat where the original message was sent (or channel username in the format 
     * @|channelusername) 
     *
     * @param int $messageId
     *        Message identifier in the chat specified in from_chat_id 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @return mixed
     */
    public function forwardMessage(
        $chatId,
        $fromChatId,
        int $messageId,
        bool $disableNotification = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'from_chat_id' => $fromChatId,
            'disable_notification' => $disableNotification,
            'message_id' => $messageId,
        ];

        return $this->_apiCall('forwardMessage', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#copymessage
     *
     * Use this method to copy messages of any kind. Service messages and invoice messages can't be copied. The method is 
     * analogous to the method forwardMessage, but the copied message doesn't have a link to the 
     * original message. Returns the MessageId of the sent message on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param int|string $fromChatId
     *        Unique identifier for the chat where the original message was sent (or channel username in the format 
     * @|channelusername) 
     *
     * @param int $messageId
     *        Message identifier in the chat specified in from_chat_id 
     *
     * @param string|null $caption
     *        New caption for media, 0-1024 characters after entities parsing. If not specified, the original caption is 
     * kept 
     *
     * @param string|null $parseMode
     *        Mode for parsing entities in the new caption. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $captionEntities
     *        List of special entities that appear in the new caption, which can be specified instead of parse_mode 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param int|null $replyToMessageId
     *        If the message is a reply, ID of the original message 
     *
     * @param bool|null $allowSendingWithoutReply
     *        Pass True, if the message should be sent even if the specified replied-to message is not found 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove reply keyboard or to force a reply from the user. 
     *
     * @return mixed
     */
    public function copyMessage(
        $chatId,
        $fromChatId,
        int $messageId,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        bool $disableNotification = null,
        int $replyToMessageId = null,
        bool $allowSendingWithoutReply = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'from_chat_id' => $fromChatId,
            'message_id' => $messageId,
            'caption' => $caption,
            'parse_mode' => $parseMode,
            'caption_entities' => $captionEntities,
            'disable_notification' => $disableNotification,
            'reply_to_message_id' => $replyToMessageId,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('copyMessage', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendphoto
     *
     * Use this method to send photos. On success, the sent Message is returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param Type\InputFile|string $photo
     *        Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers (recommended), pass an 
     * HTTP URL as a String for Telegram to get a photo from the Internet, or upload a new photo using multipart/form-data. 
     * The photo must be at most 10 MB in size. The photo's width and height must not exceed 10000 in total. Width and height 
     * ratio must be at most 20. More info on Sending Files » 
     *
     * @param string|null $caption
     *        Photo caption (may also be used when resending photos by file_id), 0-1024 characters after entities parsing 
     *
     * @param string|null $parseMode
     *        Mode for parsing entities in the photo caption. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $captionEntities
     *        List of special entities that appear in the caption, which can be specified instead of parse_mode 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param int|null $replyToMessageId
     *        If the message is a reply, ID of the original message 
     *
     * @param bool|null $allowSendingWithoutReply
     *        Pass True, if the message should be sent even if the specified replied-to message is not found 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove reply keyboard or to force a reply from the user. 
     *
     * @return mixed
     */
    public function sendPhoto(
        $chatId,
        $photo,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        bool $disableNotification = null,
        int $replyToMessageId = null,
        bool $allowSendingWithoutReply = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'photo' => $photo,
            'caption' => $caption,
            'parse_mode' => $parseMode,
            'caption_entities' => $captionEntities,
            'disable_notification' => $disableNotification,
            'reply_to_message_id' => $replyToMessageId,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendPhoto', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendaudio
     *
     * Use this method to send audio files, if you want Telegram clients to display them in the music player. Your audio must 
     * be in the .MP3 or .M4A format. On success, the sent Message is returned. Bots can currently 
     * send audio files of up to 50 MB in size, this limit may be changed in the future. For sending voice messages, use the sendVoice method instead. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param Type\InputFile|string $audio
     *        Audio file to send. Pass a file_id as String to send an audio file that exists on the Telegram servers 
     * (recommended), pass an HTTP URL as a String for Telegram to get an audio file from the Internet, or upload a new one using 
     * multipart/form-data. More info on Sending Files » 
     *
     * @param string|null $caption
     *        Audio caption, 0-1024 characters after entities parsing 
     *
     * @param string|null $parseMode
     *        Mode for parsing entities in the audio caption. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $captionEntities
     *        List of special entities that appear in the caption, which can be specified instead of parse_mode 
     *
     * @param int|null $duration
     *        Duration of the audio in seconds 
     *
     * @param string|null $performer
     *        Performer 
     *
     * @param string|null $title
     *        Track name 
     *
     * @param Type\InputFile|string|null $thumb
     *        Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The 
     * thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. 
     * Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a 
     * new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using 
     * multipart/form-data under <file_attach_name>. More info on Sending Files » 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param int|null $replyToMessageId
     *        If the message is a reply, ID of the original message 
     *
     * @param bool|null $allowSendingWithoutReply
     *        Pass True, if the message should be sent even if the specified replied-to message is not found 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove reply keyboard or to force a reply from the user. 
     *
     * @return mixed
     */
    public function sendAudio(
        $chatId,
        $audio,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        int $duration = null,
        string $performer = null,
        string $title = null,
        $thumb = null,
        bool $disableNotification = null,
        int $replyToMessageId = null,
        bool $allowSendingWithoutReply = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'audio' => $audio,
            'caption' => $caption,
            'parse_mode' => $parseMode,
            'caption_entities' => $captionEntities,
            'duration' => $duration,
            'performer' => $performer,
            'title' => $title,
            'thumb' => $thumb,
            'disable_notification' => $disableNotification,
            'reply_to_message_id' => $replyToMessageId,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendAudio', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#senddocument
     *
     * Use this method to send general files. On success, the sent Message is returned. Bots can 
     * currently send files of any type of up to 50 MB in size, this limit may be changed in the future. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param Type\InputFile|string $document
     *        File to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an 
     * HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More 
     * info on Sending Files » 
     *
     * @param Type\InputFile|string|null $thumb
     *        Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The 
     * thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. 
     * Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a 
     * new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using 
     * multipart/form-data under <file_attach_name>. More info on Sending Files » 
     *
     * @param string|null $caption
     *        Document caption (may also be used when resending documents by file_id), 0-1024 characters after entities 
     * parsing 
     *
     * @param string|null $parseMode
     *        Mode for parsing entities in the document caption. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $captionEntities
     *        List of special entities that appear in the caption, which can be specified instead of parse_mode 
     *
     * @param bool|null $disableContentTypeDetection
     *        Disables automatic server-side content type detection for files uploaded using multipart/form-data 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param int|null $replyToMessageId
     *        If the message is a reply, ID of the original message 
     *
     * @param bool|null $allowSendingWithoutReply
     *        Pass True, if the message should be sent even if the specified replied-to message is not found 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove reply keyboard or to force a reply from the user. 
     *
     * @return mixed
     */
    public function sendDocument(
        $chatId,
        $document,
        $thumb = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        bool $disableContentTypeDetection = null,
        bool $disableNotification = null,
        int $replyToMessageId = null,
        bool $allowSendingWithoutReply = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'document' => $document,
            'thumb' => $thumb,
            'caption' => $caption,
            'parse_mode' => $parseMode,
            'caption_entities' => $captionEntities,
            'disable_content_type_detection' => $disableContentTypeDetection,
            'disable_notification' => $disableNotification,
            'reply_to_message_id' => $replyToMessageId,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendDocument', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendvideo
     *
     * Use this method to send video files, Telegram clients support mp4 videos (other formats may be sent as Document). On success, the sent Message is returned. Bots can currently send video files of up to 50 MB 
     * in size, this limit may be changed in the future. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param Type\InputFile|string $video
     *        Video to send. Pass a file_id as String to send a video that exists on the Telegram servers (recommended), pass an 
     * HTTP URL as a String for Telegram to get a video from the Internet, or upload a new video using multipart/form-data. 
     * More info on Sending Files » 
     *
     * @param int|null $duration
     *        Duration of sent video in seconds 
     *
     * @param int|null $width
     *        Video width 
     *
     * @param int|null $height
     *        Video height 
     *
     * @param Type\InputFile|string|null $thumb
     *        Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The 
     * thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. 
     * Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a 
     * new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using 
     * multipart/form-data under <file_attach_name>. More info on Sending Files » 
     *
     * @param string|null $caption
     *        Video caption (may also be used when resending videos by file_id), 0-1024 characters after entities parsing 
     *
     * @param string|null $parseMode
     *        Mode for parsing entities in the video caption. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $captionEntities
     *        List of special entities that appear in the caption, which can be specified instead of parse_mode 
     *
     * @param bool|null $supportsStreaming
     *        Pass True, if the uploaded video is suitable for streaming 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param int|null $replyToMessageId
     *        If the message is a reply, ID of the original message 
     *
     * @param bool|null $allowSendingWithoutReply
     *        Pass True, if the message should be sent even if the specified replied-to message is not found 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove reply keyboard or to force a reply from the user. 
     *
     * @return mixed
     */
    public function sendVideo(
        $chatId,
        $video,
        int $duration = null,
        int $width = null,
        int $height = null,
        $thumb = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        bool $supportsStreaming = null,
        bool $disableNotification = null,
        int $replyToMessageId = null,
        bool $allowSendingWithoutReply = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'video' => $video,
            'duration' => $duration,
            'width' => $width,
            'height' => $height,
            'thumb' => $thumb,
            'caption' => $caption,
            'parse_mode' => $parseMode,
            'caption_entities' => $captionEntities,
            'supports_streaming' => $supportsStreaming,
            'disable_notification' => $disableNotification,
            'reply_to_message_id' => $replyToMessageId,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendVideo', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendanimation
     *
     * Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound). On success, the sent Message is returned. Bots can currently send animation files of up to 50 MB in size, this limit may be changed in the future. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param Type\InputFile|string $animation
     *        Animation to send. Pass a file_id as String to send an animation that exists on the Telegram servers 
     * (recommended), pass an HTTP URL as a String for Telegram to get an animation from the Internet, or upload a new animation using 
     * multipart/form-data. More info on Sending Files » 
     *
     * @param int|null $duration
     *        Duration of sent animation in seconds 
     *
     * @param int|null $width
     *        Animation width 
     *
     * @param int|null $height
     *        Animation height 
     *
     * @param Type\InputFile|string|null $thumb
     *        Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The 
     * thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. 
     * Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a 
     * new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using 
     * multipart/form-data under <file_attach_name>. More info on Sending Files » 
     *
     * @param string|null $caption
     *        Animation caption (may also be used when resending animation by file_id), 0-1024 characters after entities 
     * parsing 
     *
     * @param string|null $parseMode
     *        Mode for parsing entities in the animation caption. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $captionEntities
     *        List of special entities that appear in the caption, which can be specified instead of parse_mode 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param int|null $replyToMessageId
     *        If the message is a reply, ID of the original message 
     *
     * @param bool|null $allowSendingWithoutReply
     *        Pass True, if the message should be sent even if the specified replied-to message is not found 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove reply keyboard or to force a reply from the user. 
     *
     * @return mixed
     */
    public function sendAnimation(
        $chatId,
        $animation,
        int $duration = null,
        int $width = null,
        int $height = null,
        $thumb = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        bool $disableNotification = null,
        int $replyToMessageId = null,
        bool $allowSendingWithoutReply = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'animation' => $animation,
            'duration' => $duration,
            'width' => $width,
            'height' => $height,
            'thumb' => $thumb,
            'caption' => $caption,
            'parse_mode' => $parseMode,
            'caption_entities' => $captionEntities,
            'disable_notification' => $disableNotification,
            'reply_to_message_id' => $replyToMessageId,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendAnimation', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendvoice
     *
     * Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message. For 
     * this to work, your audio must be in an .OGG file encoded with OPUS (other formats may be sent as Audio 
     * or Document). On success, the sent Message is returned. Bots can 
     * currently send voice messages of up to 50 MB in size, this limit may be changed in the future. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param Type\InputFile|string $voice
     *        Audio file to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), 
     * pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using 
     * multipart/form-data. More info on Sending Files » 
     *
     * @param string|null $caption
     *        Voice message caption, 0-1024 characters after entities parsing 
     *
     * @param string|null $parseMode
     *        Mode for parsing entities in the voice message caption. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $captionEntities
     *        List of special entities that appear in the caption, which can be specified instead of parse_mode 
     *
     * @param int|null $duration
     *        Duration of the voice message in seconds 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param int|null $replyToMessageId
     *        If the message is a reply, ID of the original message 
     *
     * @param bool|null $allowSendingWithoutReply
     *        Pass True, if the message should be sent even if the specified replied-to message is not found 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove reply keyboard or to force a reply from the user. 
     *
     * @return mixed
     */
    public function sendVoice(
        $chatId,
        $voice,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        int $duration = null,
        bool $disableNotification = null,
        int $replyToMessageId = null,
        bool $allowSendingWithoutReply = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'voice' => $voice,
            'caption' => $caption,
            'parse_mode' => $parseMode,
            'caption_entities' => $captionEntities,
            'duration' => $duration,
            'disable_notification' => $disableNotification,
            'reply_to_message_id' => $replyToMessageId,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendVoice', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendvideonote
     *
     * As of v.4.0, Telegram clients 
     * support rounded square mp4 videos of up to 1 minute long. Use this method to send video messages. On success, the sent Message is returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param Type\InputFile|string $videoNote
     *        Video note to send. Pass a file_id as String to send a video note that exists on the Telegram servers 
     * (recommended) or upload a new video using multipart/form-data. More info on Sending Files ». Sending video notes by a URL is 
     * currently unsupported 
     *
     * @param int|null $duration
     *        Duration of sent video in seconds 
     *
     * @param int|null $length
     *        Video width and height, i.e. diameter of the video message 
     *
     * @param Type\InputFile|string|null $thumb
     *        Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The 
     * thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. 
     * Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a 
     * new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using 
     * multipart/form-data under <file_attach_name>. More info on Sending Files » 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param int|null $replyToMessageId
     *        If the message is a reply, ID of the original message 
     *
     * @param bool|null $allowSendingWithoutReply
     *        Pass True, if the message should be sent even if the specified replied-to message is not found 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove reply keyboard or to force a reply from the user. 
     *
     * @return mixed
     */
    public function sendVideoNote(
        $chatId,
        $videoNote,
        int $duration = null,
        int $length = null,
        $thumb = null,
        bool $disableNotification = null,
        int $replyToMessageId = null,
        bool $allowSendingWithoutReply = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'video_note' => $videoNote,
            'duration' => $duration,
            'length' => $length,
            'thumb' => $thumb,
            'disable_notification' => $disableNotification,
            'reply_to_message_id' => $replyToMessageId,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendVideoNote', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendmediagroup
     *
     * Use this method to send a group of photos, videos, documents or audios as an album. Documents and audio files can be 
     * only grouped in an album with messages of the same type. On success, an array of Messages that 
     * were sent is returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param Type\InputMediaAudio[]|Type\InputMediaDocument[]|Type\InputMediaPhoto[]|Type\InputMediaVideo[] $media
     *        A JSON-serialized array describing messages to be sent, must include 2-10 items 
     *
     * @param bool|null $disableNotification
     *        Sends messages silently. Users will receive a notification with no sound. 
     *
     * @param int|null $replyToMessageId
     *        If the messages are a reply, ID of the original message 
     *
     * @param bool|null $allowSendingWithoutReply
     *        Pass True, if the message should be sent even if the specified replied-to message is not found 
     *
     * @return mixed
     */
    public function sendMediaGroup(
        $chatId,
        array $media,
        bool $disableNotification = null,
        int $replyToMessageId = null,
        bool $allowSendingWithoutReply = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'media' => $media,
            'disable_notification' => $disableNotification,
            'reply_to_message_id' => $replyToMessageId,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
        ];

        return $this->_apiCall('sendMediaGroup', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendlocation
     *
     * Use this method to send point on the map. On success, the sent Message is returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param float $latitude
     *        Latitude of the location 
     *
     * @param float $longitude
     *        Longitude of the location 
     *
     * @param float|null $horizontalAccuracy
     *        The radius of uncertainty for the location, measured in meters; 0-1500 
     *
     * @param int|null $livePeriod
     *        Period in seconds for which the location will be updated (see Live Locations, should be between 60 and 86400. 
     *
     * @param int|null $heading
     *        For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified. 
     *
     * @param int|null $proximityAlertRadius
     *        For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. 
     * Must be between 1 and 100000 if specified. 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param int|null $replyToMessageId
     *        If the message is a reply, ID of the original message 
     *
     * @param bool|null $allowSendingWithoutReply
     *        Pass True, if the message should be sent even if the specified replied-to message is not found 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove reply keyboard or to force a reply from the user. 
     *
     * @return mixed
     */
    public function sendLocation(
        $chatId,
        float $latitude,
        float $longitude,
        float $horizontalAccuracy = null,
        int $livePeriod = null,
        int $heading = null,
        int $proximityAlertRadius = null,
        bool $disableNotification = null,
        int $replyToMessageId = null,
        bool $allowSendingWithoutReply = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'horizontal_accuracy' => $horizontalAccuracy,
            'live_period' => $livePeriod,
            'heading' => $heading,
            'proximity_alert_radius' => $proximityAlertRadius,
            'disable_notification' => $disableNotification,
            'reply_to_message_id' => $replyToMessageId,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendLocation', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#editmessagelivelocation
     *
     * Use this method to edit live location messages. A location can be edited until its live_period expires or 
     * editing is explicitly disabled by a call to stopMessageLiveLocation. On 
     * success, if the edited message is not an inline message, the edited Message is returned, otherwise 
     * True is returned. 
     *
     * @param float $latitude
     *        Latitude of new location 
     *
     * @param float $longitude
     *        Longitude of new location 
     *
     * @param int|string|null $chatId
     *        Required if inline_message_id is not specified. Unique identifier for the target chat or username of the 
     * target channel (in the format @|channelusername) 
     *
     * @param int|null $messageId
     *        Required if inline_message_id is not specified. Identifier of the message to edit 
     *
     * @param string|null $inlineMessageId
     *        Required if chat_id and message_id are not specified. Identifier of the inline message 
     *
     * @param float|null $horizontalAccuracy
     *        The radius of uncertainty for the location, measured in meters; 0-1500 
     *
     * @param int|null $heading
     *        Direction in which the user is moving, in degrees. Must be between 1 and 360 if specified. 
     *
     * @param int|null $proximityAlertRadius
     *        Maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 
     * 100000 if specified. 
     *
     * @param Type\InlineKeyboardMarkup|null $replyMarkup
     *        A JSON-serialized object for a new inline keyboard. 
     *
     * @return mixed
     */
    public function editMessageLiveLocation(
        float $latitude,
        float $longitude,
        $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
        float $horizontalAccuracy = null,
        int $heading = null,
        int $proximityAlertRadius = null,
        Type\InlineKeyboardMarkup $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'horizontal_accuracy' => $horizontalAccuracy,
            'heading' => $heading,
            'proximity_alert_radius' => $proximityAlertRadius,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('editMessageLiveLocation', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#stopmessagelivelocation
     *
     * Use this method to stop updating a live location message before live_period expires. On success, if the 
     * message was sent by the bot, the sent Message is returned, otherwise True is returned. 
     *
     * @param int|string|null $chatId
     *        Required if inline_message_id is not specified. Unique identifier for the target chat or username of the 
     * target channel (in the format @|channelusername) 
     *
     * @param int|null $messageId
     *        Required if inline_message_id is not specified. Identifier of the message with live location to stop 
     *
     * @param string|null $inlineMessageId
     *        Required if chat_id and message_id are not specified. Identifier of the inline message 
     *
     * @param Type\InlineKeyboardMarkup|null $replyMarkup
     *        A JSON-serialized object for a new inline keyboard. 
     *
     * @return mixed
     */
    public function stopMessageLiveLocation(
        $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
        Type\InlineKeyboardMarkup $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('stopMessageLiveLocation', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendvenue
     *
     * Use this method to send information about a venue. On success, the sent Message is 
     * returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param float $latitude
     *        Latitude of the venue 
     *
     * @param float $longitude
     *        Longitude of the venue 
     *
     * @param string $title
     *        Name of the venue 
     *
     * @param string $address
     *        Address of the venue 
     *
     * @param string|null $foursquareId
     *        Foursquare identifier of the venue 
     *
     * @param string|null $foursquareType
     *        Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, 
     * “arts_entertainment/aquarium” or “food/icecream”.) 
     *
     * @param string|null $googlePlaceId
     *        Google Places identifier of the venue 
     *
     * @param string|null $googlePlaceType
     *        Google Places type of the venue. (See supported types.) 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param int|null $replyToMessageId
     *        If the message is a reply, ID of the original message 
     *
     * @param bool|null $allowSendingWithoutReply
     *        Pass True, if the message should be sent even if the specified replied-to message is not found 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove reply keyboard or to force a reply from the user. 
     *
     * @return mixed
     */
    public function sendVenue(
        $chatId,
        float $latitude,
        float $longitude,
        string $title,
        string $address,
        string $foursquareId = null,
        string $foursquareType = null,
        string $googlePlaceId = null,
        string $googlePlaceType = null,
        bool $disableNotification = null,
        int $replyToMessageId = null,
        bool $allowSendingWithoutReply = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'title' => $title,
            'address' => $address,
            'foursquare_id' => $foursquareId,
            'foursquare_type' => $foursquareType,
            'google_place_id' => $googlePlaceId,
            'google_place_type' => $googlePlaceType,
            'disable_notification' => $disableNotification,
            'reply_to_message_id' => $replyToMessageId,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendVenue', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendcontact
     *
     * Use this method to send phone contacts. On success, the sent Message is returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param string $phoneNumber
     *        Contact's phone number 
     *
     * @param string $firstName
     *        Contact's first name 
     *
     * @param string|null $lastName
     *        Contact's last name 
     *
     * @param string|null $vcard
     *        Additional data about the contact in the form of a vCard, 0-2048 bytes 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param int|null $replyToMessageId
     *        If the message is a reply, ID of the original message 
     *
     * @param bool|null $allowSendingWithoutReply
     *        Pass True, if the message should be sent even if the specified replied-to message is not found 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove keyboard or to force a reply from the user. 
     *
     * @return mixed
     */
    public function sendContact(
        $chatId,
        string $phoneNumber,
        string $firstName,
        string $lastName = null,
        string $vcard = null,
        bool $disableNotification = null,
        int $replyToMessageId = null,
        bool $allowSendingWithoutReply = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'phone_number' => $phoneNumber,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'vcard' => $vcard,
            'disable_notification' => $disableNotification,
            'reply_to_message_id' => $replyToMessageId,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendContact', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendpoll
     *
     * Use this method to send a native poll. On success, the sent Message is returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param string[] $options
     *        A JSON-serialized list of answer options, 2-10 strings 1-100 characters each 
     *
     * @param string $question
     *        Poll question, 1-300 characters 
     *
     * @param int|null $openPeriod
     *        Amount of time in seconds the poll will be active after creation, 5-600. Can't be used together with close_date. 
     *
     * @param bool|null $allowSendingWithoutReply
     *        Pass True, if the message should be sent even if the specified replied-to message is not found 
     *
     * @param int|null $replyToMessageId
     *        If the message is a reply, ID of the original message 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $isClosed
     *        Pass True, if the poll needs to be immediately closed. This can be useful for poll preview. 
     *
     * @param int|null $closeDate
     *        Point in time (Unix timestamp) when the poll will be automatically closed. Must be at least 5 and no more than 600 
     * seconds in the future. Can't be used together with open_period. 
     *
     * @param string|null $explanationParseMode
     *        Mode for parsing entities in the explanation. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $explanationEntities
     *        List of special entities that appear in the poll explanation, which can be specified instead of parse_mode 
     *
     * @param string|null $explanation
     *        Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 
     * characters with at most 2 line feeds after entities parsing 
     *
     * @param int|null $correctOptionId
     *        0-based identifier of the correct answer option, required for polls in quiz mode 
     *
     * @param bool|null $allowsMultipleAnswers
     *        True, if the poll allows multiple answers, ignored for polls in quiz mode, defaults to False 
     *
     * @param string|null $type
     *        Poll type, “quiz” or “regular”, defaults to “regular” 
     *
     * @param bool|null $isAnonymous
     *        True, if the poll needs to be anonymous, defaults to True 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove reply keyboard or to force a reply from the user. 
     *
     * @return mixed
     */
    public function sendPoll(
        $chatId,
        array $options,
        string $question,
        int $openPeriod = null,
        bool $allowSendingWithoutReply = null,
        int $replyToMessageId = null,
        bool $disableNotification = null,
        bool $isClosed = null,
        int $closeDate = null,
        string $explanationParseMode = null,
        array $explanationEntities = null,
        string $explanation = null,
        int $correctOptionId = null,
        bool $allowsMultipleAnswers = null,
        string $type = null,
        bool $isAnonymous = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'question' => $question,
            'options' => $options,
            'is_anonymous' => $isAnonymous,
            'type' => $type,
            'allows_multiple_answers' => $allowsMultipleAnswers,
            'correct_option_id' => $correctOptionId,
            'explanation' => $explanation,
            'explanation_parse_mode' => $explanationParseMode,
            'explanation_entities' => $explanationEntities,
            'open_period' => $openPeriod,
            'close_date' => $closeDate,
            'is_closed' => $isClosed,
            'disable_notification' => $disableNotification,
            'reply_to_message_id' => $replyToMessageId,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendPoll', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#senddice
     *
     * Use this method to send an animated emoji that will display a random value. On success, the sent Message is returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param string|null $emoji
     *        Emoji on which the dice throw animation is based. Currently, must be one of “”, “”, “”, “”, 
     * “”, or “”. Dice can have values 1-6 for “”, “” and “”, values 1-5 for “” and “”, and values 
     * 1-64 for “”. Defaults to “” 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param int|null $replyToMessageId
     *        If the message is a reply, ID of the original message 
     *
     * @param bool|null $allowSendingWithoutReply
     *        Pass True, if the message should be sent even if the specified replied-to message is not found 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove reply keyboard or to force a reply from the user. 
     *
     * @return mixed
     */
    public function sendDice(
        $chatId,
        string $emoji = null,
        bool $disableNotification = null,
        int $replyToMessageId = null,
        bool $allowSendingWithoutReply = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'emoji' => $emoji,
            'disable_notification' => $disableNotification,
            'reply_to_message_id' => $replyToMessageId,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendDice', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendchataction
     *
     * Use this method when you need to tell the user that something is happening on the bot's side. The status is set for 5 
     * seconds or less (when a message arrives from your bot, Telegram clients clear its typing status). Returns True on 
     * success. We only recommend using this method when a response from the bot will take a noticeable amount of 
     * time to arrive. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param string $action
     *        Type of action to broadcast. Choose one, depending on what the user is about to receive: typing for text 
     * messages, upload_photo for photos, record_video or upload_video for videos, record_voice or upload_voice for voice 
     * notes, upload_document for general files, find_location for location data, record_video_note or 
     * upload_video_note for video notes. 
     *
     * @return mixed
     */
    public function sendChatAction(
        $chatId,
        string $action
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'action' => $action,
        ];

        return $this->_apiCall('sendChatAction', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getuserprofilephotos
     *
     * Use this method to get a list of profile pictures for a user. Returns a UserProfilePhotos object. 
     *
     * @param int $userId
     *        Unique identifier of the target user 
     *
     * @param int|null $offset
     *        Sequential number of the first photo to be returned. By default, all photos are returned. 
     *
     * @param int|null $limit
     *        Limits the number of photos to be retrieved. Values between 1-100 are accepted. Defaults to 100. 
     *
     * @return mixed
     */
    public function getUserProfilePhotos(
        int $userId,
        int $offset = null,
        int $limit = null
    )
    {
        $requestParameters = [
            'user_id' => $userId,
            'offset' => $offset,
            'limit' => $limit,
        ];

        return $this->_apiCall('getUserProfilePhotos', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getfile
     *
     * Use this method to get basic info about a file and prepare it for downloading. For the moment, bots can download files 
     * of up to 20MB in size. On success, a File object is returned. The file can then be downloaded via the 
     * link https://api.telegram.org/file/bot&lt;token&gt;/&lt;file_path&gt;, where 
     * &lt;file_path&gt; is taken from the response. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new 
     * one can be requested by calling getFile again. 
     *
     * @param string $fileId
     *        File identifier to get info about 
     *
     * @return mixed
     */
    public function getFile(
        string $fileId
    )
    {
        $requestParameters = [
            'file_id' => $fileId,
        ];

        return $this->_apiCall('getFile', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#kickchatmember
     *
     * Use this method to kick a user from a group, a supergroup or a channel. In the case of supergroups and channels, the user 
     * will not be able to return to the chat on their own using invite links, etc., unless unbanned first. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. 
     * Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target group or username of the target supergroup or channel (in the format 
     * @|channelusername) 
     *
     * @param int $userId
     *        Unique identifier of the target user 
     *
     * @param int|null $untilDate
     *        Date when the user will be unbanned, unix time. If user is banned for more than 366 days or less than 30 seconds from 
     * the current time they are considered to be banned forever. Applied for supergroups and channels only. 
     *
     * @param bool|null $revokeMessages
     *        Pass True to delete all messages from the chat for the user that is being removed. If False, the user will be able to 
     * see messages in the group that were sent before the user was removed. Always True for supergroups and channels. 
     *
     * @return mixed
     */
    public function kickChatMember(
        $chatId,
        int $userId,
        int $untilDate = null,
        bool $revokeMessages = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'until_date' => $untilDate,
            'revoke_messages' => $revokeMessages,
        ];

        return $this->_apiCall('kickChatMember', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#unbanchatmember
     *
     * Use this method to unban a previously kicked user in a supergroup or channel. The user will not 
     * return to the group or channel automatically, but will be able to join via link, etc. The bot must be an administrator for this 
     * to work. By default, this method guarantees that after the call the user is not a member of the chat, but will be able to 
     * join it. So if the user is a member of the chat they will also be removed from the chat. If you don't want 
     * this, use the parameter only_if_banned. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target group or username of the target supergroup or channel (in the format 
     * @|username) 
     *
     * @param int $userId
     *        Unique identifier of the target user 
     *
     * @param bool|null $onlyIfBanned
     *        Do nothing if the user is not banned 
     *
     * @return mixed
     */
    public function unbanChatMember(
        $chatId,
        int $userId,
        bool $onlyIfBanned = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'only_if_banned' => $onlyIfBanned,
        ];

        return $this->_apiCall('unbanChatMember', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#restrictchatmember
     *
     * Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for this to work 
     * and must have the appropriate admin rights. Pass True for all permissions to lift restrictions from a user. 
     * Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup (in the format 
     * @|supergroupusername) 
     *
     * @param int $userId
     *        Unique identifier of the target user 
     *
     * @param Type\ChatPermissions $permissions
     *        A JSON-serialized object for new user permissions 
     *
     * @param int|null $untilDate
     *        Date when restrictions will be lifted for the user, unix time. If user is restricted for more than 366 days or less 
     * than 30 seconds from the current time, they are considered to be restricted forever 
     *
     * @return mixed
     */
    public function restrictChatMember(
        $chatId,
        int $userId,
        Type\ChatPermissions $permissions,
        int $untilDate = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'permissions' => $permissions,
            'until_date' => $untilDate,
        ];

        return $this->_apiCall('restrictChatMember', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#promotechatmember
     *
     * Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the chat for 
     * this to work and must have the appropriate admin rights. Pass False for all boolean parameters to demote a user. 
     * Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param int $userId
     *        Unique identifier of the target user 
     *
     * @param bool|null $isAnonymous
     *        Pass True, if the administrator's presence in the chat is hidden 
     *
     * @param bool|null $canManageChat
     *        Pass True, if the administrator can access the chat event log, chat statistics, message statistics in 
     * channels, see channel members, see anonymous administrators in supergroups and ignore slow mode. Implied by any other 
     * administrator privilege 
     *
     * @param bool|null $canPostMessages
     *        Pass True, if the administrator can create channel posts, channels only 
     *
     * @param bool|null $canEditMessages
     *        Pass True, if the administrator can edit messages of other users and can pin messages, channels only 
     *
     * @param bool|null $canDeleteMessages
     *        Pass True, if the administrator can delete messages of other users 
     *
     * @param bool|null $canManageVoiceChats
     *        Pass True, if the administrator can manage voice chats 
     *
     * @param bool|null $canRestrictMembers
     *        Pass True, if the administrator can restrict, ban or unban chat members 
     *
     * @param bool|null $canPromoteMembers
     *        Pass True, if the administrator can add new administrators with a subset of their own privileges or demote 
     * administrators that he has promoted, directly or indirectly (promoted by administrators that were appointed by him) 
     *
     * @param bool|null $canChangeInfo
     *        Pass True, if the administrator can change chat title, photo and other settings 
     *
     * @param bool|null $canInviteUsers
     *        Pass True, if the administrator can invite new users to the chat 
     *
     * @param bool|null $canPinMessages
     *        Pass True, if the administrator can pin messages, supergroups only 
     *
     * @return mixed
     */
    public function promoteChatMember(
        $chatId,
        int $userId,
        bool $isAnonymous = null,
        bool $canManageChat = null,
        bool $canPostMessages = null,
        bool $canEditMessages = null,
        bool $canDeleteMessages = null,
        bool $canManageVoiceChats = null,
        bool $canRestrictMembers = null,
        bool $canPromoteMembers = null,
        bool $canChangeInfo = null,
        bool $canInviteUsers = null,
        bool $canPinMessages = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'is_anonymous' => $isAnonymous,
            'can_manage_chat' => $canManageChat,
            'can_post_messages' => $canPostMessages,
            'can_edit_messages' => $canEditMessages,
            'can_delete_messages' => $canDeleteMessages,
            'can_manage_voice_chats' => $canManageVoiceChats,
            'can_restrict_members' => $canRestrictMembers,
            'can_promote_members' => $canPromoteMembers,
            'can_change_info' => $canChangeInfo,
            'can_invite_users' => $canInviteUsers,
            'can_pin_messages' => $canPinMessages,
        ];

        return $this->_apiCall('promoteChatMember', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setchatadministratorcustomtitle
     *
     * Use this method to set a custom title for an administrator in a supergroup promoted by the bot. Returns True 
     * on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup (in the format 
     * @|supergroupusername) 
     *
     * @param int $userId
     *        Unique identifier of the target user 
     *
     * @param string $customTitle
     *        New custom title for the administrator; 0-16 characters, emoji are not allowed 
     *
     * @return mixed
     */
    public function setChatAdministratorCustomTitle(
        $chatId,
        int $userId,
        string $customTitle
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'custom_title' => $customTitle,
        ];

        return $this->_apiCall('setChatAdministratorCustomTitle', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setchatpermissions
     *
     * Use this method to set default chat permissions for all members. The bot must be an administrator in the group or a 
     * supergroup for this to work and must have the can_restrict_members admin rights. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup (in the format 
     * @|supergroupusername) 
     *
     * @param Type\ChatPermissions $permissions
     *        New default chat permissions 
     *
     * @return mixed
     */
    public function setChatPermissions(
        $chatId,
        Type\ChatPermissions $permissions
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'permissions' => $permissions,
        ];

        return $this->_apiCall('setChatPermissions', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#exportchatinvitelink
     *
     * Use this method to generate a new primary invite link for a chat; any previously generated primary link is revoked. 
     * The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns the new 
     * invite link as String on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @return mixed
     */
    public function exportChatInviteLink(
        $chatId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
        ];

        return $this->_apiCall('exportChatInviteLink', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#createchatinvitelink
     *
     * Use this method to create an additional invite link for a chat. The bot must be an administrator in the chat for this to 
     * work and must have the appropriate admin rights. The link can be revoked using the method revokeChatInviteLink. Returns the new invite link as ChatInviteLink object. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param int|null $expireDate
     *        Point in time (Unix timestamp) when the link will expire 
     *
     * @param int|null $memberLimit
     *        Maximum number of users that can be members of the chat simultaneously after joining the chat via this invite 
     * link; 1-99999 
     *
     * @return mixed
     */
    public function createChatInviteLink(
        $chatId,
        int $expireDate = null,
        int $memberLimit = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'expire_date' => $expireDate,
            'member_limit' => $memberLimit,
        ];

        return $this->_apiCall('createChatInviteLink', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#editchatinvitelink
     *
     * Use this method to edit a non-primary invite link created by the bot. The bot must be an administrator in the chat for 
     * this to work and must have the appropriate admin rights. Returns the edited invite link as a ChatInviteLink object. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param string $inviteLink
     *        The invite link to edit 
     *
     * @param int|null $expireDate
     *        Point in time (Unix timestamp) when the link will expire 
     *
     * @param int|null $memberLimit
     *        Maximum number of users that can be members of the chat simultaneously after joining the chat via this invite 
     * link; 1-99999 
     *
     * @return mixed
     */
    public function editChatInviteLink(
        $chatId,
        string $inviteLink,
        int $expireDate = null,
        int $memberLimit = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'invite_link' => $inviteLink,
            'expire_date' => $expireDate,
            'member_limit' => $memberLimit,
        ];

        return $this->_apiCall('editChatInviteLink', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#revokechatinvitelink
     *
     * Use this method to revoke an invite link created by the bot. If the primary link is revoked, a new link is automatically 
     * generated. The bot must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns the 
     * revoked invite link as ChatInviteLink object. 
     *
     * @param int|string $chatId
     *        Unique identifier of the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param string $inviteLink
     *        The invite link to revoke 
     *
     * @return mixed
     */
    public function revokeChatInviteLink(
        $chatId,
        string $inviteLink
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'invite_link' => $inviteLink,
        ];

        return $this->_apiCall('revokeChatInviteLink', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setchatphoto
     *
     * Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot must be an 
     * administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param Type\InputFile $photo
     *        New chat photo, uploaded using multipart/form-data 
     *
     * @return mixed
     */
    public function setChatPhoto(
        $chatId,
        Type\InputFile $photo
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'photo' => $photo,
        ];

        return $this->_apiCall('setChatPhoto', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#deletechatphoto
     *
     * Use this method to delete a chat photo. Photos can't be changed for private chats. The bot must be an administrator in 
     * the chat for this to work and must have the appropriate admin rights. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @return mixed
     */
    public function deleteChatPhoto(
        $chatId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
        ];

        return $this->_apiCall('deleteChatPhoto', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setchattitle
     *
     * Use this method to change the title of a chat. Titles can't be changed for private chats. The bot must be an 
     * administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param string $title
     *        New chat title, 1-255 characters 
     *
     * @return mixed
     */
    public function setChatTitle(
        $chatId,
        string $title
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'title' => $title,
        ];

        return $this->_apiCall('setChatTitle', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setchatdescription
     *
     * Use this method to change the description of a group, a supergroup or a channel. The bot must be an administrator in the 
     * chat for this to work and must have the appropriate admin rights. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param string|null $description
     *        New chat description, 0-255 characters 
     *
     * @return mixed
     */
    public function setChatDescription(
        $chatId,
        string $description = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'description' => $description,
        ];

        return $this->_apiCall('setChatDescription', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#pinchatmessage
     *
     * Use this method to add a message to the list of pinned messages in a chat. If the chat is not a private chat, the bot must be 
     * an administrator in the chat for this to work and must have the 'can_pin_messages' admin right in a supergroup or 
     * 'can_edit_messages' admin right in a channel. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param int $messageId
     *        Identifier of a message to pin 
     *
     * @param bool|null $disableNotification
     *        Pass True, if it is not necessary to send a notification to all chat members about the new pinned message. 
     * Notifications are always disabled in channels and private chats. 
     *
     * @return mixed
     */
    public function pinChatMessage(
        $chatId,
        int $messageId,
        bool $disableNotification = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'disable_notification' => $disableNotification,
        ];

        return $this->_apiCall('pinChatMessage', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#unpinchatmessage
     *
     * Use this method to remove a message from the list of pinned messages in a chat. If the chat is not a private chat, the bot 
     * must be an administrator in the chat for this to work and must have the 'can_pin_messages' admin right in a supergroup or 
     * 'can_edit_messages' admin right in a channel. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param int|null $messageId
     *        Identifier of a message to unpin. If not specified, the most recent pinned message (by sending date) will be 
     * unpinned. 
     *
     * @return mixed
     */
    public function unpinChatMessage(
        $chatId,
        int $messageId = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
        ];

        return $this->_apiCall('unpinChatMessage', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#unpinallchatmessages
     *
     * Use this method to clear the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an 
     * administrator in the chat for this to work and must have the 'can_pin_messages' admin right in a supergroup or 'can_edit_messages' 
     * admin right in a channel. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @return mixed
     */
    public function unpinAllChatMessages(
        $chatId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
        ];

        return $this->_apiCall('unpinAllChatMessages', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#leavechat
     *
     * Use this method for your bot to leave a group, supergroup or channel. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup or channel (in the format 
     * @|channelusername) 
     *
     * @return mixed
     */
    public function leaveChat(
        $chatId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
        ];

        return $this->_apiCall('leaveChat', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getchat
     *
     * Use this method to get up to date information about the chat (current name of the user for one-on-one conversations, 
     * current username of a user, group or channel, etc.). Returns a Chat object on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup or channel (in the format 
     * @|channelusername) 
     *
     * @return mixed
     */
    public function getChat(
        $chatId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
        ];

        return $this->_apiCall('getChat', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getchatadministrators
     *
     * Use this method to get a list of administrators in a chat. On success, returns an Array of ChatMember objects that contains information about all chat administrators except other bots. If the chat is a group or a 
     * supergroup and no administrators were appointed, only the creator will be returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup or channel (in the format 
     * @|channelusername) 
     *
     * @return mixed
     */
    public function getChatAdministrators(
        $chatId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
        ];

        return $this->_apiCall('getChatAdministrators', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getchatmemberscount
     *
     * Use this method to get the number of members in a chat. Returns Int on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup or channel (in the format 
     * @|channelusername) 
     *
     * @return mixed
     */
    public function getChatMembersCount(
        $chatId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
        ];

        return $this->_apiCall('getChatMembersCount', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getchatmember
     *
     * Use this method to get information about a member of a chat. Returns a ChatMember object 
     * on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup or channel (in the format 
     * @|channelusername) 
     *
     * @param int $userId
     *        Unique identifier of the target user 
     *
     * @return mixed
     */
    public function getChatMember(
        $chatId,
        int $userId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'user_id' => $userId,
        ];

        return $this->_apiCall('getChatMember', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setchatstickerset
     *
     * Use this method to set a new group sticker set for a supergroup. The bot must be an administrator in the chat for this to 
     * work and must have the appropriate admin rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup (in the format 
     * @|supergroupusername) 
     *
     * @param string $stickerSetName
     *        Name of the sticker set to be set as the group sticker set 
     *
     * @return mixed
     */
    public function setChatStickerSet(
        $chatId,
        string $stickerSetName
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'sticker_set_name' => $stickerSetName,
        ];

        return $this->_apiCall('setChatStickerSet', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#deletechatstickerset
     *
     * Use this method to delete a group sticker set from a supergroup. The bot must be an administrator in the chat for this to 
     * work and must have the appropriate admin rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup (in the format 
     * @|supergroupusername) 
     *
     * @return mixed
     */
    public function deleteChatStickerSet(
        $chatId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
        ];

        return $this->_apiCall('deleteChatStickerSet', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#answercallbackquery
     *
     * Use this method to send answers to callback queries sent from inline keyboards. The answer will be displayed to the user as a notification at the top of the chat screen or as an alert. 
     * On success, True is returned. 
     *
     * @param string $callbackQueryId
     *        Unique identifier for the query to be answered 
     *
     * @param string|null $text
     *        Text of the notification. If not specified, nothing will be shown to the user, 0-200 characters 
     *
     * @param bool|null $showAlert
     *        If true, an alert will be shown by the client instead of a notification at the top of the chat screen. Defaults to 
     * false. 
     *
     * @param string|null $url
     *        URL that will be opened by the user's client. If you have created a Game and accepted the conditions via 
     * @|Botfather, specify the URL that opens your game — note that this will only work if the query comes from a callback_game 
     * button.Otherwise, you may use links like t.me/your_bot?start=XXXX that open your bot with a parameter. 
     *
     * @param int|null $cacheTime
     *        The maximum amount of time in seconds that the result of the callback query may be cached client-side. Telegram 
     * apps will support caching starting in version 3.14. Defaults to 0. 
     *
     * @return mixed
     */
    public function answerCallbackQuery(
        string $callbackQueryId,
        string $text = null,
        bool $showAlert = null,
        string $url = null,
        int $cacheTime = null
    )
    {
        $requestParameters = [
            'callback_query_id' => $callbackQueryId,
            'text' => $text,
            'show_alert' => $showAlert,
            'url' => $url,
            'cache_time' => $cacheTime,
        ];

        return $this->_apiCall('answerCallbackQuery', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setmycommands
     *
     * Use this method to change the list of the bot's commands. Returns True on success. 
     *
     * @param Type\BotCommand[] $commands
     *        A JSON-serialized list of bot commands to be set as the list of the bot's commands. At most 100 commands can be 
     * specified. 
     *
     * @return mixed
     */
    public function setMyCommands(
        array $commands
    )
    {
        $requestParameters = [
            'commands' => $commands,
        ];

        return $this->_apiCall('setMyCommands', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getmycommands
     *
     * Use this method to get the current list of the bot's commands. Requires no parameters. Returns Array of BotCommand on success. 
     *
     * @return mixed
     */
    public function getMyCommands(
    )
    {
        $requestParameters = [
        ];

        return $this->_apiCall('getMyCommands', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#editmessagetext
     *
     * Use this method to edit text and game messages. On success, if the edited message is not an 
     * inline message, the edited Message is returned, otherwise True is returned. 
     *
     * @param string $text
     *        New text of the message, 1-4096 characters after entities parsing 
     *
     * @param int|string|null $chatId
     *        Required if inline_message_id is not specified. Unique identifier for the target chat or username of the 
     * target channel (in the format @|channelusername) 
     *
     * @param int|null $messageId
     *        Required if inline_message_id is not specified. Identifier of the message to edit 
     *
     * @param string|null $inlineMessageId
     *        Required if chat_id and message_id are not specified. Identifier of the inline message 
     *
     * @param string|null $parseMode
     *        Mode for parsing entities in the message text. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $entities
     *        List of special entities that appear in message text, which can be specified instead of parse_mode 
     *
     * @param bool|null $disableWebPagePreview
     *        Disables link previews for links in this message 
     *
     * @param Type\InlineKeyboardMarkup|null $replyMarkup
     *        A JSON-serialized object for an inline keyboard. 
     *
     * @return mixed
     */
    public function editMessageText(
        string $text,
        $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
        string $parseMode = null,
        array $entities = null,
        bool $disableWebPagePreview = null,
        Type\InlineKeyboardMarkup $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'text' => $text,
            'parse_mode' => $parseMode,
            'entities' => $entities,
            'disable_web_page_preview' => $disableWebPagePreview,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('editMessageText', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#editmessagecaption
     *
     * Use this method to edit captions of messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. 
     *
     * @param int|string|null $chatId
     *        Required if inline_message_id is not specified. Unique identifier for the target chat or username of the 
     * target channel (in the format @|channelusername) 
     *
     * @param int|null $messageId
     *        Required if inline_message_id is not specified. Identifier of the message to edit 
     *
     * @param string|null $inlineMessageId
     *        Required if chat_id and message_id are not specified. Identifier of the inline message 
     *
     * @param string|null $caption
     *        New caption of the message, 0-1024 characters after entities parsing 
     *
     * @param string|null $parseMode
     *        Mode for parsing entities in the message caption. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $captionEntities
     *        List of special entities that appear in the caption, which can be specified instead of parse_mode 
     *
     * @param Type\InlineKeyboardMarkup|null $replyMarkup
     *        A JSON-serialized object for an inline keyboard. 
     *
     * @return mixed
     */
    public function editMessageCaption(
        $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        Type\InlineKeyboardMarkup $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'caption' => $caption,
            'parse_mode' => $parseMode,
            'caption_entities' => $captionEntities,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('editMessageCaption', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#editmessagemedia
     *
     * Use this method to edit animation, audio, document, photo, or video messages. If a message is part of a message album, 
     * then it can be edited only to an audio for audio albums, only to a document for document albums and to a photo or a video 
     * otherwise. When an inline message is edited, a new file can't be uploaded. Use a previously uploaded file via its file_id or 
     * specify a URL. On success, if the edited message was sent by the bot, the edited Message is returned, 
     * otherwise True is returned. 
     *
     * @param Type\AbstractInputMedia $media
     *        A JSON-serialized object for a new media content of the message 
     *
     * @param int|string|null $chatId
     *        Required if inline_message_id is not specified. Unique identifier for the target chat or username of the 
     * target channel (in the format @|channelusername) 
     *
     * @param int|null $messageId
     *        Required if inline_message_id is not specified. Identifier of the message to edit 
     *
     * @param string|null $inlineMessageId
     *        Required if chat_id and message_id are not specified. Identifier of the inline message 
     *
     * @param Type\InlineKeyboardMarkup|null $replyMarkup
     *        A JSON-serialized object for a new inline keyboard. 
     *
     * @return mixed
     */
    public function editMessageMedia(
        Type\AbstractInputMedia $media,
        $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
        Type\InlineKeyboardMarkup $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'media' => $media,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('editMessageMedia', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#editmessagereplymarkup
     *
     * Use this method to edit only the reply markup of messages. On success, if the edited message is not an inline message, 
     * the edited Message is returned, otherwise True is returned. 
     *
     * @param int|string|null $chatId
     *        Required if inline_message_id is not specified. Unique identifier for the target chat or username of the 
     * target channel (in the format @|channelusername) 
     *
     * @param int|null $messageId
     *        Required if inline_message_id is not specified. Identifier of the message to edit 
     *
     * @param string|null $inlineMessageId
     *        Required if chat_id and message_id are not specified. Identifier of the inline message 
     *
     * @param Type\InlineKeyboardMarkup|null $replyMarkup
     *        A JSON-serialized object for an inline keyboard. 
     *
     * @return mixed
     */
    public function editMessageReplyMarkup(
        $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
        Type\InlineKeyboardMarkup $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('editMessageReplyMarkup', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#stoppoll
     *
     * Use this method to stop a poll which was sent by the bot. On success, the stopped Poll with the 
     * final results is returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param int $messageId
     *        Identifier of the original message with the poll 
     *
     * @param Type\InlineKeyboardMarkup|null $replyMarkup
     *        A JSON-serialized object for a new message inline keyboard. 
     *
     * @return mixed
     */
    public function stopPoll(
        $chatId,
        int $messageId,
        Type\InlineKeyboardMarkup $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('stopPoll', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#deletemessage
     *
     * Use this method to delete a message, including service messages, with the following limitations:- A message 
     * can only be deleted if it was sent less than 48 hours ago.- A dice message in a private chat can only be deleted if it was 
     * sent more than 24 hours ago.- Bots can delete outgoing messages in private chats, groups, and supergroups.- 
     * Bots can delete incoming messages in private chats.- Bots granted can_post_messages permissions can 
     * delete outgoing messages in channels.- If the bot is an administrator of a group, it can delete any message there.- 
     * If the bot has can_delete_messages permission in a supergroup or a channel, it can delete any message 
     * there.Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param int $messageId
     *        Identifier of the message to delete 
     *
     * @return mixed
     */
    public function deleteMessage(
        $chatId,
        int $messageId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
        ];

        return $this->_apiCall('deleteMessage', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendsticker
     *
     * Use this method to send static .WEBP or animated 
     * .TGS stickers. On success, the sent Message is returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param Type\InputFile|string $sticker
     *        Sticker to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass 
     * an HTTP URL as a String for Telegram to get a .WEBP file from the Internet, or upload a new one using 
     * multipart/form-data. More info on Sending Files » 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param int|null $replyToMessageId
     *        If the message is a reply, ID of the original message 
     *
     * @param bool|null $allowSendingWithoutReply
     *        Pass True, if the message should be sent even if the specified replied-to message is not found 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove reply keyboard or to force a reply from the user. 
     *
     * @return mixed
     */
    public function sendSticker(
        $chatId,
        $sticker,
        bool $disableNotification = null,
        int $replyToMessageId = null,
        bool $allowSendingWithoutReply = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'sticker' => $sticker,
            'disable_notification' => $disableNotification,
            'reply_to_message_id' => $replyToMessageId,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendSticker', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getstickerset
     *
     * Use this method to get a sticker set. On success, a StickerSet object is returned. 
     *
     * @param string $name
     *        Name of the sticker set 
     *
     * @return mixed
     */
    public function getStickerSet(
        string $name
    )
    {
        $requestParameters = [
            'name' => $name,
        ];

        return $this->_apiCall('getStickerSet', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#uploadstickerfile
     *
     * Use this method to upload a .PNG file with a sticker for later use in createNewStickerSet and 
     * addStickerToSet methods (can be used multiple times). Returns the uploaded File on success. 
     *
     * @param int $userId
     *        User identifier of sticker file owner 
     *
     * @param Type\InputFile $pngSticker
     *        PNG image with the sticker, must be up to 512 kilobytes in size, dimensions must not exceed 512px, and either 
     * width or height must be exactly 512px. More info on Sending Files » 
     *
     * @return mixed
     */
    public function uploadStickerFile(
        int $userId,
        Type\InputFile $pngSticker
    )
    {
        $requestParameters = [
            'user_id' => $userId,
            'png_sticker' => $pngSticker,
        ];

        return $this->_apiCall('uploadStickerFile', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#createnewstickerset
     *
     * Use this method to create a new sticker set owned by a user. The bot will be able to edit the sticker set thus created. You 
     * must use exactly one of the fields png_sticker or tgs_sticker. Returns True on success. 
     *
     * @param int $userId
     *        User identifier of created sticker set owner 
     *
     * @param string $name
     *        Short name of sticker set, to be used in t.me/addstickers/ URLs (e.g., animals). Can contain only english 
     * letters, digits and underscores. Must begin with a letter, can't contain consecutive underscores and must end in 
     * “_by_<bot username>”. <bot_username> is case insensitive. 1-64 characters. 
     *
     * @param string $title
     *        Sticker set title, 1-64 characters 
     *
     * @param string $emojis
     *        One or more emoji corresponding to the sticker 
     *
     * @param Type\InputFile|string|null $pngSticker
     *        PNG image with the sticker, must be up to 512 kilobytes in size, dimensions must not exceed 512px, and either 
     * width or height must be exactly 512px. Pass a file_id as a String to send a file that already exists on the Telegram 
     * servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using 
     * multipart/form-data. More info on Sending Files » 
     *
     * @param Type\InputFile|null $tgsSticker
     *        TGS animation with the sticker, uploaded using multipart/form-data. See 
     * https://core.telegram.org/animated_stickers#technical-requirements for technical requirements 
     *
     * @param bool|null $containsMasks
     *        Pass True, if a set of mask stickers should be created 
     *
     * @param Type\MaskPosition|null $maskPosition
     *        A JSON-serialized object for position where the mask should be placed on faces 
     *
     * @return mixed
     */
    public function createNewStickerSet(
        int $userId,
        string $name,
        string $title,
        string $emojis,
        $pngSticker = null,
        Type\InputFile $tgsSticker = null,
        bool $containsMasks = null,
        Type\MaskPosition $maskPosition = null
    )
    {
        $requestParameters = [
            'user_id' => $userId,
            'name' => $name,
            'title' => $title,
            'png_sticker' => $pngSticker,
            'tgs_sticker' => $tgsSticker,
            'emojis' => $emojis,
            'contains_masks' => $containsMasks,
            'mask_position' => $maskPosition,
        ];

        return $this->_apiCall('createNewStickerSet', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#addstickertoset
     *
     * Use this method to add a new sticker to a set created by the bot. You must use exactly one of the 
     * fields png_sticker or tgs_sticker. Animated stickers can be added to animated sticker sets and only 
     * to them. Animated sticker sets can have up to 50 stickers. Static sticker sets can have up to 120 stickers. Returns 
     * True on success. 
     *
     * @param int $userId
     *        User identifier of sticker set owner 
     *
     * @param string $name
     *        Sticker set name 
     *
     * @param string $emojis
     *        One or more emoji corresponding to the sticker 
     *
     * @param Type\InputFile|string|null $pngSticker
     *        PNG image with the sticker, must be up to 512 kilobytes in size, dimensions must not exceed 512px, and either 
     * width or height must be exactly 512px. Pass a file_id as a String to send a file that already exists on the Telegram 
     * servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using 
     * multipart/form-data. More info on Sending Files » 
     *
     * @param Type\InputFile|null $tgsSticker
     *        TGS animation with the sticker, uploaded using multipart/form-data. See 
     * https://core.telegram.org/animated_stickers#technical-requirements for technical requirements 
     *
     * @param Type\MaskPosition|null $maskPosition
     *        A JSON-serialized object for position where the mask should be placed on faces 
     *
     * @return mixed
     */
    public function addStickerToSet(
        int $userId,
        string $name,
        string $emojis,
        $pngSticker = null,
        Type\InputFile $tgsSticker = null,
        Type\MaskPosition $maskPosition = null
    )
    {
        $requestParameters = [
            'user_id' => $userId,
            'name' => $name,
            'png_sticker' => $pngSticker,
            'tgs_sticker' => $tgsSticker,
            'emojis' => $emojis,
            'mask_position' => $maskPosition,
        ];

        return $this->_apiCall('addStickerToSet', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setstickerpositioninset
     *
     * Use this method to move a sticker in a set created by the bot to a specific position. Returns True on success. 
     *
     * @param string $sticker
     *        File identifier of the sticker 
     *
     * @param int $position
     *        New sticker position in the set, zero-based 
     *
     * @return mixed
     */
    public function setStickerPositionInSet(
        string $sticker,
        int $position
    )
    {
        $requestParameters = [
            'sticker' => $sticker,
            'position' => $position,
        ];

        return $this->_apiCall('setStickerPositionInSet', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#deletestickerfromset
     *
     * Use this method to delete a sticker from a set created by the bot. Returns True on success. 
     *
     * @param string $sticker
     *        File identifier of the sticker 
     *
     * @return mixed
     */
    public function deleteStickerFromSet(
        string $sticker
    )
    {
        $requestParameters = [
            'sticker' => $sticker,
        ];

        return $this->_apiCall('deleteStickerFromSet', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setstickersetthumb
     *
     * Use this method to set the thumbnail of a sticker set. Animated thumbnails can be set for animated sticker sets only. 
     * Returns True on success. To enable this option, send the /setinline command to @|BotFather and provide the placeholder text that the user will see in the input field after typing your bot's name. 
     *
     * @param string $name
     *        Sticker set name 
     *
     * @param int $userId
     *        User identifier of the sticker set owner 
     *
     * @param Type\InputFile|string|null $thumb
     *        A PNG image with the thumbnail, must be up to 128 kilobytes in size and have width and height exactly 100px, or a TGS 
     * animation with the thumbnail up to 32 kilobytes in size; see 
     * https://core.telegram.org/animated_stickers#technical-requirements for animated sticker technical requirements. Pass a file_id as a String to send a file that already exists on the 
     * Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using 
     * multipart/form-data. More info on Sending Files ». Animated sticker set thumbnail can't be uploaded via HTTP URL. 
     *
     * @return mixed
     */
    public function setStickerSetThumb(
        string $name,
        int $userId,
        $thumb = null
    )
    {
        $requestParameters = [
            'name' => $name,
            'user_id' => $userId,
            'thumb' => $thumb,
        ];

        return $this->_apiCall('setStickerSetThumb', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#answerinlinequery
     *
     * Use this method to send answers to an inline query. On success, True is returned.No more than 
     * 50 results per query are allowed. 
     *
     * @param string $inlineQueryId
     *        Unique identifier for the answered query 
     *
     * @param Type\AbstractInlineQueryResult[] $results
     *        A JSON-serialized array of results for the inline query 
     *
     * @param int|null $cacheTime
     *        The maximum amount of time in seconds that the result of the inline query may be cached on the server. Defaults to 
     * 300. 
     *
     * @param bool|null $isPersonal
     *        Pass True, if results may be cached on the server side only for the user that sent the query. By default, results 
     * may be returned to any user who sends the same query 
     *
     * @param string|null $nextOffset
     *        Pass the offset that a client should send in the next query with the same text to receive more results. Pass an 
     * empty string if there are no more results or if you don't support pagination. Offset length can't exceed 64 bytes. 
     *
     * @param string|null $switchPmText
     *        If passed, clients will display a button with specified text that switches the user to a private chat with the bot 
     * and sends the bot a start message with the parameter switch_pm_parameter 
     *
     * @param string|null $switchPmParameter
     *        Deep-linking parameter for the /start message sent to the bot when user presses the switch button. 1-64 
     * characters, only A-Z, a-z, 0-9, _ and - are allowed.Example: An inline bot that sends YouTube videos can ask the user to 
     * connect the bot to their YouTube account to adapt search results accordingly. To do this, it displays a 'Connect your 
     * YouTube account' button above the results, or even before showing any. The user presses the button, switches to a 
     * private chat with the bot and, in doing so, passes a start parameter that instructs the bot to return an oauth link. Once 
     * done, the bot can offer a switch_inline button so that the user can easily return to the chat where they wanted to use the 
     * bot's inline capabilities. 
     *
     * @return mixed
     */
    public function answerInlineQuery(
        string $inlineQueryId,
        array $results,
        int $cacheTime = null,
        bool $isPersonal = null,
        string $nextOffset = null,
        string $switchPmText = null,
        string $switchPmParameter = null
    )
    {
        $requestParameters = [
            'inline_query_id' => $inlineQueryId,
            'results' => $results,
            'cache_time' => $cacheTime,
            'is_personal' => $isPersonal,
            'next_offset' => $nextOffset,
            'switch_pm_text' => $switchPmText,
            'switch_pm_parameter' => $switchPmParameter,
        ];

        return $this->_apiCall('answerInlineQuery', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendinvoice
     *
     * Use this method to send invoices. On success, the sent Message is returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param string $description
     *        Product description, 1-255 characters 
     *
     * @param string $payload
     *        Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal 
     * processes. 
     *
     * @param string $providerToken
     *        Payments provider token, obtained via Botfather 
     *
     * @param string $currency
     *        Three-letter ISO 4217 currency code, see more on currencies 
     *
     * @param Type\LabeledPrice[] $prices
     *        Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, 
     * delivery tax, bonus, etc.) 
     *
     * @param string $title
     *        Product name, 1-32 characters 
     *
     * @param bool|null $needEmail
     *        Pass True, if you require the user's email address to complete the order 
     *
     * @param bool|null $allowSendingWithoutReply
     *        Pass True, if the message should be sent even if the specified replied-to message is not found 
     *
     * @param int|null $replyToMessageId
     *        If the message is a reply, ID of the original message 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $isFlexible
     *        Pass True, if the final price depends on the shipping method 
     *
     * @param bool|null $sendEmailToProvider
     *        Pass True, if user's email address should be sent to provider 
     *
     * @param bool|null $sendPhoneNumberToProvider
     *        Pass True, if user's phone number should be sent to provider 
     *
     * @param bool|null $needShippingAddress
     *        Pass True, if you require the user's shipping address to complete the order 
     *
     * @param int|null $photoWidth
     *        Photo width 
     *
     * @param bool|null $needPhoneNumber
     *        Pass True, if you require the user's phone number to complete the order 
     *
     * @param bool|null $needName
     *        Pass True, if you require the user's full name to complete the order 
     *
     * @param int|null $photoHeight
     *        Photo height 
     *
     * @param int|null $photoSize
     *        Photo size 
     *
     * @param string|null $photoUrl
     *        URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service. People like 
     * it better when they see what they are paying for. 
     *
     * @param string|null $providerData
     *        A JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed 
     * description of required fields should be provided by the payment provider. 
     *
     * @param string|null $startParameter
     *        Unique deep-linking parameter. If left empty, forwarded copies of the sent message will have a Pay button, 
     * allowing multiple users to pay directly from the forwarded message, using the same invoice. If non-empty, forwarded 
     * copies of the sent message will have a URL button with a deep link to the bot (instead of a Pay button), with the value used 
     * as the start parameter 
     *
     * @param int[]|null $suggestedTipAmounts
     *        A JSON-serialized array of suggested amounts of tips in the smallest units of the currency (integer, not 
     * float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a 
     * strictly increased order and must not exceed max_tip_amount. 
     *
     * @param int|null $maxTipAmount
     *        The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For 
     * example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the 
     * number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0 
     *
     * @param Type\InlineKeyboardMarkup|null $replyMarkup
     *        A JSON-serialized object for an inline keyboard. If empty, one 'Pay total price' button will be shown. If not 
     * empty, the first button must be a Pay button. 
     *
     * @return mixed
     */
    public function sendInvoice(
        $chatId,
        string $description,
        string $payload,
        string $providerToken,
        string $currency,
        array $prices,
        string $title,
        bool $needEmail = null,
        bool $allowSendingWithoutReply = null,
        int $replyToMessageId = null,
        bool $disableNotification = null,
        bool $isFlexible = null,
        bool $sendEmailToProvider = null,
        bool $sendPhoneNumberToProvider = null,
        bool $needShippingAddress = null,
        int $photoWidth = null,
        bool $needPhoneNumber = null,
        bool $needName = null,
        int $photoHeight = null,
        int $photoSize = null,
        string $photoUrl = null,
        string $providerData = null,
        string $startParameter = null,
        array $suggestedTipAmounts = null,
        int $maxTipAmount = null,
        Type\InlineKeyboardMarkup $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'title' => $title,
            'description' => $description,
            'payload' => $payload,
            'provider_token' => $providerToken,
            'currency' => $currency,
            'prices' => $prices,
            'max_tip_amount' => $maxTipAmount,
            'suggested_tip_amounts' => $suggestedTipAmounts,
            'start_parameter' => $startParameter,
            'provider_data' => $providerData,
            'photo_url' => $photoUrl,
            'photo_size' => $photoSize,
            'photo_width' => $photoWidth,
            'photo_height' => $photoHeight,
            'need_name' => $needName,
            'need_phone_number' => $needPhoneNumber,
            'need_email' => $needEmail,
            'need_shipping_address' => $needShippingAddress,
            'send_phone_number_to_provider' => $sendPhoneNumberToProvider,
            'send_email_to_provider' => $sendEmailToProvider,
            'is_flexible' => $isFlexible,
            'disable_notification' => $disableNotification,
            'reply_to_message_id' => $replyToMessageId,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendInvoice', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#answershippingquery
     *
     * If you sent an invoice requesting a shipping address and the parameter is_flexible was specified, the Bot 
     * API will send an Update with a shipping_query field to the bot. Use this method to 
     * reply to shipping queries. On success, True is returned. 
     *
     * @param string $shippingQueryId
     *        Unique identifier for the query to be answered 
     *
     * @param bool $ok
     *        Specify True if delivery to the specified address is possible and False if there are any problems (for example, 
     * if delivery to the specified address is not possible) 
     *
     * @param Type\ShippingOption[]|null $shippingOptions
     *        Required if ok is True. A JSON-serialized array of available shipping options. 
     *
     * @param string|null $errorMessage
     *        Required if ok is False. Error message in human readable form that explains why it is impossible to complete the 
     * order (e.g. "Sorry, delivery to your desired address is unavailable'). Telegram will display this message to the 
     * user. 
     *
     * @return mixed
     */
    public function answerShippingQuery(
        string $shippingQueryId,
        bool $ok,
        array $shippingOptions = null,
        string $errorMessage = null
    )
    {
        $requestParameters = [
            'shipping_query_id' => $shippingQueryId,
            'ok' => $ok,
            'shipping_options' => $shippingOptions,
            'error_message' => $errorMessage,
        ];

        return $this->_apiCall('answerShippingQuery', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#answerprecheckoutquery
     *
     * Once the user has confirmed their payment and shipping details, the Bot API sends the final confirmation in the form 
     * of an Update with the field pre_checkout_query. Use this method to respond to such 
     * pre-checkout queries. On success, True is returned. Note: The Bot API must receive an answer within 10 seconds 
     * after the pre-checkout query was sent. 
     *
     * @param string $preCheckoutQueryId
     *        Unique identifier for the query to be answered 
     *
     * @param bool $ok
     *        Specify True if everything is alright (goods are available, etc.) and the bot is ready to proceed with the order. 
     * Use False if there are any problems. 
     *
     * @param string|null $errorMessage
     *        Required if ok is False. Error message in human readable form that explains the reason for failure to proceed 
     * with the checkout (e.g. "Sorry, somebody just bought the last of our amazing black T-shirts while you were busy 
     * filling out your payment details. Please choose a different color or garment!"). Telegram will display this message to 
     * the user. 
     *
     * @return mixed
     */
    public function answerPreCheckoutQuery(
        string $preCheckoutQueryId,
        bool $ok,
        string $errorMessage = null
    )
    {
        $requestParameters = [
            'pre_checkout_query_id' => $preCheckoutQueryId,
            'ok' => $ok,
            'error_message' => $errorMessage,
        ];

        return $this->_apiCall('answerPreCheckoutQuery', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setpassportdataerrors
     *
     * Informs a user that some of the Telegram Passport elements they provided contains errors. The user will not be able to 
     * re-submit their Passport to you until the errors are fixed (the contents of the field for which you returned the error must 
     * change). Returns True on success. Use this if the data submitted by the user doesn't satisfy the standards your 
     * service requires for any reason. For example, if a birthday date seems invalid, a submitted document is blurry, a scan shows 
     * evidence of tampering, etc. Supply some details in the error message to make sure the user knows how to correct the issues. 
     *
     * @param int $userId
     *        User identifier 
     *
     * @param Type\AbstractPassportElementError[] $errors
     *        A JSON-serialized array describing the errors 
     *
     * @return mixed
     */
    public function setPassportDataErrors(
        int $userId,
        array $errors
    )
    {
        $requestParameters = [
            'user_id' => $userId,
            'errors' => $errors,
        ];

        return $this->_apiCall('setPassportDataErrors', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendgame
     *
     * Use this method to send a game. On success, the sent Message is returned. 
     *
     * @param int $chatId
     *        Unique identifier for the target chat 
     *
     * @param string $gameShortName
     *        Short name of the game, serves as the unique identifier for the game. Set up your games via Botfather. 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param int|null $replyToMessageId
     *        If the message is a reply, ID of the original message 
     *
     * @param bool|null $allowSendingWithoutReply
     *        Pass True, if the message should be sent even if the specified replied-to message is not found 
     *
     * @param Type\InlineKeyboardMarkup|null $replyMarkup
     *        A JSON-serialized object for an inline keyboard. If empty, one 'Play game_title' button will be shown. If not 
     * empty, the first button must launch the game. 
     *
     * @return mixed
     */
    public function sendGame(
        int $chatId,
        string $gameShortName,
        bool $disableNotification = null,
        int $replyToMessageId = null,
        bool $allowSendingWithoutReply = null,
        Type\InlineKeyboardMarkup $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'game_short_name' => $gameShortName,
            'disable_notification' => $disableNotification,
            'reply_to_message_id' => $replyToMessageId,
            'allow_sending_without_reply' => $allowSendingWithoutReply,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendGame', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setgamescore
     *
     * Use this method to set the score of the specified user in a game. On success, if the message was sent by the bot, returns 
     * the edited Message, otherwise returns True. Returns an error, if the new score is 
     * not greater than the user's current score in the chat and force is False. 
     *
     * @param int $userId
     *        User identifier 
     *
     * @param int $score
     *        New score, must be non-negative 
     *
     * @param bool|null $force
     *        Pass True, if the high score is allowed to decrease. This can be useful when fixing mistakes or banning cheaters 
     *
     * @param bool|null $disableEditMessage
     *        Pass True, if the game message should not be automatically edited to include the current scoreboard 
     *
     * @param int|null $chatId
     *        Required if inline_message_id is not specified. Unique identifier for the target chat 
     *
     * @param int|null $messageId
     *        Required if inline_message_id is not specified. Identifier of the sent message 
     *
     * @param string|null $inlineMessageId
     *        Required if chat_id and message_id are not specified. Identifier of the inline message 
     *
     * @return mixed
     */
    public function setGameScore(
        int $userId,
        int $score,
        bool $force = null,
        bool $disableEditMessage = null,
        int $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null
    )
    {
        $requestParameters = [
            'user_id' => $userId,
            'score' => $score,
            'force' => $force,
            'disable_edit_message' => $disableEditMessage,
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
        ];

        return $this->_apiCall('setGameScore', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getgamehighscores
     *
     * Use this method to get data for high score tables. Will return the score of the specified user and several of their 
     * neighbors in a game. On success, returns an Array of GameHighScore objects. 
     *
     * @param int $userId
     *        Target user id 
     *
     * @param int|null $chatId
     *        Required if inline_message_id is not specified. Unique identifier for the target chat 
     *
     * @param int|null $messageId
     *        Required if inline_message_id is not specified. Identifier of the sent message 
     *
     * @param string|null $inlineMessageId
     *        Required if chat_id and message_id are not specified. Identifier of the inline message 
     *
     * @return mixed
     */
    public function getGameHighScores(
        int $userId,
        int $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null
    )
    {
        $requestParameters = [
            'user_id' => $userId,
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
        ];

        return $this->_apiCall('getGameHighScores', $requestParameters);
    }
}