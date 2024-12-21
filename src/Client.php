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
     * Use this method to receive incoming updates using long polling (wiki). Returns an Array of Update objects. 
     *
     * @param int|null $offset
     *        Identifier of the first update to be returned. Must be greater by one than the highest among the identifiers of 
     * previously received updates. By default, updates starting with the earliest unconfirmed update are returned. An update 
     * is considered confirmed as soon as getUpdates is called with an offset higher than its update_id. The negative 
     * offset can be specified to retrieve updates starting from -offset update from the end of the updates queue. All 
     * previous updates will be forgotten. 
     *
     * @param int|null $limit
     *        Limits the number of updates to be retrieved. Values between 1-100 are accepted. Defaults to 100. 
     *
     * @param int|null $timeout
     *        Timeout in seconds for long polling. Defaults to 0, i.e. usual short polling. Should be positive, short polling 
     * should be used for testing purposes only. 
     *
     * @param string[]|null $allowedUpdates
     *        A JSON-serialized list of the update types you want your bot to receive. For example, specify ["message", 
     * "edited_channel_post", "callback_query"] to only receive updates of these types. See Update for a complete list of available update 
     * types. Specify an empty list to receive all update types except chat_member, message_reaction, and 
     * message_reaction_count (default). If not specified, the previous setting will be used.Please note that this parameter doesn't affect 
     * updates created before the call to the getUpdates, so unwanted updates may be received for a short period of time. 
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
     * Use this method to specify a URL and receive incoming updates via an outgoing webhook. Whenever there is an update for 
     * the bot, we will send an HTTPS POST request to the specified URL, containing a JSON-serialized Update. In case of an unsuccessful request, we will give up after a reasonable amount of attempts. Returns True on 
     * success. If you'd like to make sure that the webhook was set by you, you can specify secret data in the parameter 
     * secret_token. If specified, the request will contain a header “X-Telegram-Bot-Api-Secret-Token” with the secret token as 
     * content. 
     *
     * @param string $url
     *        HTTPS URL to send updates to. Use an empty string to remove webhook integration 
     *
     * @param Type\InputFile|null $certificate
     *        Upload your public key certificate so that the root certificate in use can be checked. See our self-signed guide 
     * for details. 
     *
     * @param string|null $ipAddress
     *        The fixed IP address which will be used to send webhook requests instead of the IP address resolved through DNS 
     *
     * @param int|null $maxConnections
     *        The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery, 1-100. 
     * Defaults to 40. Use lower values to limit the load on your bot's server, and higher values to increase your bot's 
     * throughput. 
     *
     * @param string[]|null $allowedUpdates
     *        A JSON-serialized list of the update types you want your bot to receive. For example, specify ["message", 
     * "edited_channel_post", "callback_query"] to only receive updates of these types. See Update for a complete list of available update 
     * types. Specify an empty list to receive all update types except chat_member, message_reaction, and 
     * message_reaction_count (default). If not specified, the previous setting will be used.Please note that this parameter doesn't affect 
     * updates created before the call to the setWebhook, so unwanted updates may be received for a short period of time. 
     *
     * @param bool|null $dropPendingUpdates
     *        Pass True to drop all pending updates 
     *
     * @param string|null $secretToken
     *        A secret token to be sent in a header “X-Telegram-Bot-Api-Secret-Token” in every webhook request, 1-256 
     * characters. Only characters A-Z, a-z, 0-9, _ and - are allowed. The header is useful to ensure that the request comes from a 
     * webhook set by you. 
     *
     * @return mixed
     */
    public function setWebhook(
        string $url,
        Type\InputFile $certificate = null,
        string $ipAddress = null,
        int $maxConnections = null,
        array $allowedUpdates = null,
        bool $dropPendingUpdates = null,
        string $secretToken = null
    )
    {
        $requestParameters = [
            'url' => $url,
            'certificate' => $certificate,
            'ip_address' => $ipAddress,
            'max_connections' => $maxConnections,
            'allowed_updates' => $allowedUpdates,
            'drop_pending_updates' => $dropPendingUpdates,
            'secret_token' => $secretToken,
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
     * A simple method for testing your bot's authentication token. Requires no parameters. Returns basic information 
     * about the bot in form of a User object. 
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
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message will be sent 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
     *
     * @param string|null $parseMode
     *        Mode for parsing entities in the message text. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $entities
     *        A JSON-serialized list of special entities that appear in message text, which can be specified instead of 
     * parse_mode 
     *
     * @param Type\LinkPreviewOptions|null $linkPreviewOptions
     *        Link preview generation options for the message 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $protectContent
     *        Protects the contents of the sent message from forwarding and saving 
     *
     * @param bool|null $allowPaidBroadcast
     *        Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars 
     * per message. The relevant Stars will be withdrawn from the bot's balance 
     *
     * @param string|null $messageEffectId
     *        Unique identifier of the message effect to be added to the message; for private chats only 
     *
     * @param Type\ReplyParameters|null $replyParameters
     *        Description of the message to reply to 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove a reply keyboard or to force a reply from the user 
     *
     * @return mixed
     */
    public function sendMessage(
        $chatId,
        string $text,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        string $parseMode = null,
        array $entities = null,
        Type\LinkPreviewOptions $linkPreviewOptions = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $allowPaidBroadcast = null,
        string $messageEffectId = null,
        Type\ReplyParameters $replyParameters = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'text' => $text,
            'parse_mode' => $parseMode,
            'entities' => $entities,
            'link_preview_options' => $linkPreviewOptions,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'allow_paid_broadcast' => $allowPaidBroadcast,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendMessage', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#forwardmessage
     *
     * Use this method to forward messages of any kind. Service messages and messages with protected content can't be 
     * forwarded. On success, the sent Message is returned. 
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
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $protectContent
     *        Protects the contents of the forwarded message from forwarding and saving 
     *
     * @return mixed
     */
    public function forwardMessage(
        $chatId,
        $fromChatId,
        int $messageId,
        int $messageThreadId = null,
        bool $disableNotification = null,
        bool $protectContent = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'from_chat_id' => $fromChatId,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'message_id' => $messageId,
        ];

        return $this->_apiCall('forwardMessage', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#forwardmessages
     *
     * Use this method to forward multiple messages of any kind. If some of the specified messages can't be found or 
     * forwarded, they are skipped. Service messages and messages with protected content can't be forwarded. Album grouping is kept 
     * for forwarded messages. On success, an array of MessageId of the sent messages is returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param int|string $fromChatId
     *        Unique identifier for the chat where the original messages were sent (or channel username in the format 
     * @|channelusername) 
     *
     * @param int[] $messageIds
     *        A JSON-serialized list of 1-100 identifiers of messages in the chat from_chat_id to forward. The identifiers 
     * must be specified in a strictly increasing order. 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
     *
     * @param bool|null $disableNotification
     *        Sends the messages silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $protectContent
     *        Protects the contents of the forwarded messages from forwarding and saving 
     *
     * @return mixed
     */
    public function forwardMessages(
        $chatId,
        $fromChatId,
        array $messageIds,
        int $messageThreadId = null,
        bool $disableNotification = null,
        bool $protectContent = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'from_chat_id' => $fromChatId,
            'message_ids' => $messageIds,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
        ];

        return $this->_apiCall('forwardMessages', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#copymessage
     *
     * Use this method to copy messages of any kind. Service messages, paid media messages, giveaway messages, giveaway 
     * winners messages, and invoice messages can't be copied. A quiz poll can be copied only if the value of 
     * the field correct_option_id is known to the bot. The method is analogous to the method forwardMessage, but the copied message doesn't have a link to the original message. Returns the MessageId of the sent message on success. 
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
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
     *
     * @param string|null $caption
     *        New caption for media, 0-1024 characters after entities parsing. If not specified, the original caption is 
     * kept 
     *
     * @param string|null $parseMode
     *        Mode for parsing entities in the new caption. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $captionEntities
     *        A JSON-serialized list of special entities that appear in the new caption, which can be specified instead of 
     * parse_mode 
     *
     * @param bool|null $showCaptionAboveMedia
     *        Pass True, if the caption must be shown above the message media. Ignored if a new caption isn't specified. 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $protectContent
     *        Protects the contents of the sent message from forwarding and saving 
     *
     * @param bool|null $allowPaidBroadcast
     *        Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars 
     * per message. The relevant Stars will be withdrawn from the bot's balance 
     *
     * @param Type\ReplyParameters|null $replyParameters
     *        Description of the message to reply to 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove a reply keyboard or to force a reply from the user 
     *
     * @return mixed
     */
    public function copyMessage(
        $chatId,
        $fromChatId,
        int $messageId,
        int $messageThreadId = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        bool $showCaptionAboveMedia = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $allowPaidBroadcast = null,
        Type\ReplyParameters $replyParameters = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'from_chat_id' => $fromChatId,
            'message_id' => $messageId,
            'caption' => $caption,
            'parse_mode' => $parseMode,
            'caption_entities' => $captionEntities,
            'show_caption_above_media' => $showCaptionAboveMedia,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'allow_paid_broadcast' => $allowPaidBroadcast,
            'reply_parameters' => $replyParameters,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('copyMessage', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#copymessages
     *
     * Use this method to copy messages of any kind. If some of the specified messages can't be found or copied, they are 
     * skipped. Service messages, paid media messages, giveaway messages, giveaway winners messages, and invoice messages can't 
     * be copied. A quiz poll can be copied only if the value of the field correct_option_id is 
     * known to the bot. The method is analogous to the method forwardMessages, but the copied 
     * messages don't have a link to the original message. Album grouping is kept for copied messages. On success, an array of MessageId of the sent messages is returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param int|string $fromChatId
     *        Unique identifier for the chat where the original messages were sent (or channel username in the format 
     * @|channelusername) 
     *
     * @param int[] $messageIds
     *        A JSON-serialized list of 1-100 identifiers of messages in the chat from_chat_id to copy. The identifiers must 
     * be specified in a strictly increasing order. 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
     *
     * @param bool|null $disableNotification
     *        Sends the messages silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $protectContent
     *        Protects the contents of the sent messages from forwarding and saving 
     *
     * @param bool|null $removeCaption
     *        Pass True to copy the messages without their captions 
     *
     * @return mixed
     */
    public function copyMessages(
        $chatId,
        $fromChatId,
        array $messageIds,
        int $messageThreadId = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $removeCaption = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'from_chat_id' => $fromChatId,
            'message_ids' => $messageIds,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'remove_caption' => $removeCaption,
        ];

        return $this->_apiCall('copyMessages', $requestParameters);
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
     * ratio must be at most 20. More information on Sending Files » 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message will be sent 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
     *
     * @param string|null $caption
     *        Photo caption (may also be used when resending photos by file_id), 0-1024 characters after entities parsing 
     *
     * @param string|null $parseMode
     *        Mode for parsing entities in the photo caption. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $captionEntities
     *        A JSON-serialized list of special entities that appear in the caption, which can be specified instead of 
     * parse_mode 
     *
     * @param bool|null $showCaptionAboveMedia
     *        Pass True, if the caption must be shown above the message media 
     *
     * @param bool|null $hasSpoiler
     *        Pass True if the photo needs to be covered with a spoiler animation 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $protectContent
     *        Protects the contents of the sent message from forwarding and saving 
     *
     * @param bool|null $allowPaidBroadcast
     *        Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars 
     * per message. The relevant Stars will be withdrawn from the bot's balance 
     *
     * @param string|null $messageEffectId
     *        Unique identifier of the message effect to be added to the message; for private chats only 
     *
     * @param Type\ReplyParameters|null $replyParameters
     *        Description of the message to reply to 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove a reply keyboard or to force a reply from the user 
     *
     * @return mixed
     */
    public function sendPhoto(
        $chatId,
        $photo,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        bool $showCaptionAboveMedia = null,
        bool $hasSpoiler = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $allowPaidBroadcast = null,
        string $messageEffectId = null,
        Type\ReplyParameters $replyParameters = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'photo' => $photo,
            'caption' => $caption,
            'parse_mode' => $parseMode,
            'caption_entities' => $captionEntities,
            'show_caption_above_media' => $showCaptionAboveMedia,
            'has_spoiler' => $hasSpoiler,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'allow_paid_broadcast' => $allowPaidBroadcast,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters,
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
     * multipart/form-data. More information on Sending Files » 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message will be sent 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
     *
     * @param string|null $caption
     *        Audio caption, 0-1024 characters after entities parsing 
     *
     * @param string|null $parseMode
     *        Mode for parsing entities in the audio caption. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $captionEntities
     *        A JSON-serialized list of special entities that appear in the caption, which can be specified instead of 
     * parse_mode 
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
     * @param Type\InputFile|string|null $thumbnail
     *        Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The 
     * thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. 
     * Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a 
     * new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using 
     * multipart/form-data under <file_attach_name>. More information on Sending Files » 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $protectContent
     *        Protects the contents of the sent message from forwarding and saving 
     *
     * @param bool|null $allowPaidBroadcast
     *        Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars 
     * per message. The relevant Stars will be withdrawn from the bot's balance 
     *
     * @param string|null $messageEffectId
     *        Unique identifier of the message effect to be added to the message; for private chats only 
     *
     * @param Type\ReplyParameters|null $replyParameters
     *        Description of the message to reply to 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove a reply keyboard or to force a reply from the user 
     *
     * @return mixed
     */
    public function sendAudio(
        $chatId,
        $audio,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        int $duration = null,
        string $performer = null,
        string $title = null,
        $thumbnail = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $allowPaidBroadcast = null,
        string $messageEffectId = null,
        Type\ReplyParameters $replyParameters = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'audio' => $audio,
            'caption' => $caption,
            'parse_mode' => $parseMode,
            'caption_entities' => $captionEntities,
            'duration' => $duration,
            'performer' => $performer,
            'title' => $title,
            'thumbnail' => $thumbnail,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'allow_paid_broadcast' => $allowPaidBroadcast,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters,
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
     * information on Sending Files » 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message will be sent 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
     *
     * @param Type\InputFile|string|null $thumbnail
     *        Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The 
     * thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. 
     * Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a 
     * new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using 
     * multipart/form-data under <file_attach_name>. More information on Sending Files » 
     *
     * @param string|null $caption
     *        Document caption (may also be used when resending documents by file_id), 0-1024 characters after entities 
     * parsing 
     *
     * @param string|null $parseMode
     *        Mode for parsing entities in the document caption. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $captionEntities
     *        A JSON-serialized list of special entities that appear in the caption, which can be specified instead of 
     * parse_mode 
     *
     * @param bool|null $disableContentTypeDetection
     *        Disables automatic server-side content type detection for files uploaded using multipart/form-data 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $protectContent
     *        Protects the contents of the sent message from forwarding and saving 
     *
     * @param bool|null $allowPaidBroadcast
     *        Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars 
     * per message. The relevant Stars will be withdrawn from the bot's balance 
     *
     * @param string|null $messageEffectId
     *        Unique identifier of the message effect to be added to the message; for private chats only 
     *
     * @param Type\ReplyParameters|null $replyParameters
     *        Description of the message to reply to 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove a reply keyboard or to force a reply from the user 
     *
     * @return mixed
     */
    public function sendDocument(
        $chatId,
        $document,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        $thumbnail = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        bool $disableContentTypeDetection = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $allowPaidBroadcast = null,
        string $messageEffectId = null,
        Type\ReplyParameters $replyParameters = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'document' => $document,
            'thumbnail' => $thumbnail,
            'caption' => $caption,
            'parse_mode' => $parseMode,
            'caption_entities' => $captionEntities,
            'disable_content_type_detection' => $disableContentTypeDetection,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'allow_paid_broadcast' => $allowPaidBroadcast,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendDocument', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendvideo
     *
     * Use this method to send video files, Telegram clients support MPEG4 videos (other formats may be sent as Document). On success, the sent Message is returned. Bots can currently send video files of up to 50 MB 
     * in size, this limit may be changed in the future. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param Type\InputFile|string $video
     *        Video to send. Pass a file_id as String to send a video that exists on the Telegram servers (recommended), pass an 
     * HTTP URL as a String for Telegram to get a video from the Internet, or upload a new video using multipart/form-data. 
     * More information on Sending Files » 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message will be sent 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
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
     * @param Type\InputFile|string|null $thumbnail
     *        Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The 
     * thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. 
     * Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a 
     * new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using 
     * multipart/form-data under <file_attach_name>. More information on Sending Files » 
     *
     * @param string|null $caption
     *        Video caption (may also be used when resending videos by file_id), 0-1024 characters after entities parsing 
     *
     * @param string|null $parseMode
     *        Mode for parsing entities in the video caption. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $captionEntities
     *        A JSON-serialized list of special entities that appear in the caption, which can be specified instead of 
     * parse_mode 
     *
     * @param bool|null $showCaptionAboveMedia
     *        Pass True, if the caption must be shown above the message media 
     *
     * @param bool|null $hasSpoiler
     *        Pass True if the video needs to be covered with a spoiler animation 
     *
     * @param bool|null $supportsStreaming
     *        Pass True if the uploaded video is suitable for streaming 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $protectContent
     *        Protects the contents of the sent message from forwarding and saving 
     *
     * @param bool|null $allowPaidBroadcast
     *        Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars 
     * per message. The relevant Stars will be withdrawn from the bot's balance 
     *
     * @param string|null $messageEffectId
     *        Unique identifier of the message effect to be added to the message; for private chats only 
     *
     * @param Type\ReplyParameters|null $replyParameters
     *        Description of the message to reply to 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove a reply keyboard or to force a reply from the user 
     *
     * @return mixed
     */
    public function sendVideo(
        $chatId,
        $video,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        int $duration = null,
        int $width = null,
        int $height = null,
        $thumbnail = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        bool $showCaptionAboveMedia = null,
        bool $hasSpoiler = null,
        bool $supportsStreaming = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $allowPaidBroadcast = null,
        string $messageEffectId = null,
        Type\ReplyParameters $replyParameters = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'video' => $video,
            'duration' => $duration,
            'width' => $width,
            'height' => $height,
            'thumbnail' => $thumbnail,
            'caption' => $caption,
            'parse_mode' => $parseMode,
            'caption_entities' => $captionEntities,
            'show_caption_above_media' => $showCaptionAboveMedia,
            'has_spoiler' => $hasSpoiler,
            'supports_streaming' => $supportsStreaming,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'allow_paid_broadcast' => $allowPaidBroadcast,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters,
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
     * multipart/form-data. More information on Sending Files » 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message will be sent 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
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
     * @param Type\InputFile|string|null $thumbnail
     *        Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The 
     * thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. 
     * Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a 
     * new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using 
     * multipart/form-data under <file_attach_name>. More information on Sending Files » 
     *
     * @param string|null $caption
     *        Animation caption (may also be used when resending animation by file_id), 0-1024 characters after entities 
     * parsing 
     *
     * @param string|null $parseMode
     *        Mode for parsing entities in the animation caption. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $captionEntities
     *        A JSON-serialized list of special entities that appear in the caption, which can be specified instead of 
     * parse_mode 
     *
     * @param bool|null $showCaptionAboveMedia
     *        Pass True, if the caption must be shown above the message media 
     *
     * @param bool|null $hasSpoiler
     *        Pass True if the animation needs to be covered with a spoiler animation 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $protectContent
     *        Protects the contents of the sent message from forwarding and saving 
     *
     * @param bool|null $allowPaidBroadcast
     *        Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars 
     * per message. The relevant Stars will be withdrawn from the bot's balance 
     *
     * @param string|null $messageEffectId
     *        Unique identifier of the message effect to be added to the message; for private chats only 
     *
     * @param Type\ReplyParameters|null $replyParameters
     *        Description of the message to reply to 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove a reply keyboard or to force a reply from the user 
     *
     * @return mixed
     */
    public function sendAnimation(
        $chatId,
        $animation,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        int $duration = null,
        int $width = null,
        int $height = null,
        $thumbnail = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        bool $showCaptionAboveMedia = null,
        bool $hasSpoiler = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $allowPaidBroadcast = null,
        string $messageEffectId = null,
        Type\ReplyParameters $replyParameters = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'animation' => $animation,
            'duration' => $duration,
            'width' => $width,
            'height' => $height,
            'thumbnail' => $thumbnail,
            'caption' => $caption,
            'parse_mode' => $parseMode,
            'caption_entities' => $captionEntities,
            'show_caption_above_media' => $showCaptionAboveMedia,
            'has_spoiler' => $hasSpoiler,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'allow_paid_broadcast' => $allowPaidBroadcast,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendAnimation', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendvoice
     *
     * Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message. For 
     * this to work, your audio must be in an .OGG file encoded with OPUS, or in .MP3 format, or in .M4A format (other formats may be 
     * sent as Audio or Document). On success, the sent Message is returned. Bots can currently send voice messages of up to 50 MB in size, this limit may be changed in the future. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param Type\InputFile|string $voice
     *        Audio file to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), 
     * pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using 
     * multipart/form-data. More information on Sending Files » 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message will be sent 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
     *
     * @param string|null $caption
     *        Voice message caption, 0-1024 characters after entities parsing 
     *
     * @param string|null $parseMode
     *        Mode for parsing entities in the voice message caption. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $captionEntities
     *        A JSON-serialized list of special entities that appear in the caption, which can be specified instead of 
     * parse_mode 
     *
     * @param int|null $duration
     *        Duration of the voice message in seconds 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $protectContent
     *        Protects the contents of the sent message from forwarding and saving 
     *
     * @param bool|null $allowPaidBroadcast
     *        Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars 
     * per message. The relevant Stars will be withdrawn from the bot's balance 
     *
     * @param string|null $messageEffectId
     *        Unique identifier of the message effect to be added to the message; for private chats only 
     *
     * @param Type\ReplyParameters|null $replyParameters
     *        Description of the message to reply to 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove a reply keyboard or to force a reply from the user 
     *
     * @return mixed
     */
    public function sendVoice(
        $chatId,
        $voice,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        int $duration = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $allowPaidBroadcast = null,
        string $messageEffectId = null,
        Type\ReplyParameters $replyParameters = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'voice' => $voice,
            'caption' => $caption,
            'parse_mode' => $parseMode,
            'caption_entities' => $captionEntities,
            'duration' => $duration,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'allow_paid_broadcast' => $allowPaidBroadcast,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendVoice', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendvideonote
     *
     * As of v.4.0, Telegram clients 
     * support rounded square MPEG4 videos of up to 1 minute long. Use this method to send video messages. On success, the sent Message is returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param Type\InputFile|string $videoNote
     *        Video note to send. Pass a file_id as String to send a video note that exists on the Telegram servers 
     * (recommended) or upload a new video using multipart/form-data. More information on Sending Files ». Sending video notes by a 
     * URL is currently unsupported 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message will be sent 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
     *
     * @param int|null $duration
     *        Duration of sent video in seconds 
     *
     * @param int|null $length
     *        Video width and height, i.e. diameter of the video message 
     *
     * @param Type\InputFile|string|null $thumbnail
     *        Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The 
     * thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. 
     * Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a 
     * new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using 
     * multipart/form-data under <file_attach_name>. More information on Sending Files » 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $protectContent
     *        Protects the contents of the sent message from forwarding and saving 
     *
     * @param bool|null $allowPaidBroadcast
     *        Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars 
     * per message. The relevant Stars will be withdrawn from the bot's balance 
     *
     * @param string|null $messageEffectId
     *        Unique identifier of the message effect to be added to the message; for private chats only 
     *
     * @param Type\ReplyParameters|null $replyParameters
     *        Description of the message to reply to 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove a reply keyboard or to force a reply from the user 
     *
     * @return mixed
     */
    public function sendVideoNote(
        $chatId,
        $videoNote,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        int $duration = null,
        int $length = null,
        $thumbnail = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $allowPaidBroadcast = null,
        string $messageEffectId = null,
        Type\ReplyParameters $replyParameters = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'video_note' => $videoNote,
            'duration' => $duration,
            'length' => $length,
            'thumbnail' => $thumbnail,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'allow_paid_broadcast' => $allowPaidBroadcast,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendVideoNote', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendpaidmedia
     *
     * Use this method to send paid media. On success, the sent Message is returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername). If 
     * the chat is a channel, all Telegram Star proceeds from this media will be credited to the chat's balance. Otherwise, 
     * they will be credited to the bot's balance. 
     *
     * @param int $starCount
     *        The number of Telegram Stars that must be paid to buy access to the media; 1-2500 
     *
     * @param Type\AbstractInputPaidMedia[] $media
     *        A JSON-serialized array describing the media to be sent; up to 10 items 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message will be sent 
     *
     * @param string|null $payload
     *        Bot-defined paid media payload, 0-128 bytes. This will not be displayed to the user, use it for your internal 
     * processes. 
     *
     * @param string|null $caption
     *        Media caption, 0-1024 characters after entities parsing 
     *
     * @param string|null $parseMode
     *        Mode for parsing entities in the media caption. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $captionEntities
     *        A JSON-serialized list of special entities that appear in the caption, which can be specified instead of 
     * parse_mode 
     *
     * @param bool|null $showCaptionAboveMedia
     *        Pass True, if the caption must be shown above the message media 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $protectContent
     *        Protects the contents of the sent message from forwarding and saving 
     *
     * @param bool|null $allowPaidBroadcast
     *        Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars 
     * per message. The relevant Stars will be withdrawn from the bot's balance 
     *
     * @param Type\ReplyParameters|null $replyParameters
     *        Description of the message to reply to 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove a reply keyboard or to force a reply from the user 
     *
     * @return mixed
     */
    public function sendPaidMedia(
        $chatId,
        int $starCount,
        array $media,
        string $businessConnectionId = null,
        string $payload = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        bool $showCaptionAboveMedia = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $allowPaidBroadcast = null,
        Type\ReplyParameters $replyParameters = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'star_count' => $starCount,
            'media' => $media,
            'payload' => $payload,
            'caption' => $caption,
            'parse_mode' => $parseMode,
            'caption_entities' => $captionEntities,
            'show_caption_above_media' => $showCaptionAboveMedia,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'allow_paid_broadcast' => $allowPaidBroadcast,
            'reply_parameters' => $replyParameters,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendPaidMedia', $requestParameters);
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
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message will be sent 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
     *
     * @param bool|null $disableNotification
     *        Sends messages silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $protectContent
     *        Protects the contents of the sent messages from forwarding and saving 
     *
     * @param bool|null $allowPaidBroadcast
     *        Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars 
     * per message. The relevant Stars will be withdrawn from the bot's balance 
     *
     * @param string|null $messageEffectId
     *        Unique identifier of the message effect to be added to the message; for private chats only 
     *
     * @param Type\ReplyParameters|null $replyParameters
     *        Description of the message to reply to 
     *
     * @return mixed
     */
    public function sendMediaGroup(
        $chatId,
        array $media,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $allowPaidBroadcast = null,
        string $messageEffectId = null,
        Type\ReplyParameters $replyParameters = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'media' => $media,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'allow_paid_broadcast' => $allowPaidBroadcast,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters,
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
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message will be sent 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
     *
     * @param float|null $horizontalAccuracy
     *        The radius of uncertainty for the location, measured in meters; 0-1500 
     *
     * @param int|null $livePeriod
     *        Period in seconds during which the location will be updated (see Live Locations, should be between 60 and 86400, 
     * or 0x7FFFFFFF for live locations that can be edited indefinitely. 
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
     * @param bool|null $protectContent
     *        Protects the contents of the sent message from forwarding and saving 
     *
     * @param bool|null $allowPaidBroadcast
     *        Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars 
     * per message. The relevant Stars will be withdrawn from the bot's balance 
     *
     * @param string|null $messageEffectId
     *        Unique identifier of the message effect to be added to the message; for private chats only 
     *
     * @param Type\ReplyParameters|null $replyParameters
     *        Description of the message to reply to 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove a reply keyboard or to force a reply from the user 
     *
     * @return mixed
     */
    public function sendLocation(
        $chatId,
        float $latitude,
        float $longitude,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        float $horizontalAccuracy = null,
        int $livePeriod = null,
        int $heading = null,
        int $proximityAlertRadius = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $allowPaidBroadcast = null,
        string $messageEffectId = null,
        Type\ReplyParameters $replyParameters = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'horizontal_accuracy' => $horizontalAccuracy,
            'live_period' => $livePeriod,
            'heading' => $heading,
            'proximity_alert_radius' => $proximityAlertRadius,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'allow_paid_broadcast' => $allowPaidBroadcast,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendLocation', $requestParameters);
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
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message will be sent 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
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
     * @param bool|null $protectContent
     *        Protects the contents of the sent message from forwarding and saving 
     *
     * @param bool|null $allowPaidBroadcast
     *        Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars 
     * per message. The relevant Stars will be withdrawn from the bot's balance 
     *
     * @param string|null $messageEffectId
     *        Unique identifier of the message effect to be added to the message; for private chats only 
     *
     * @param Type\ReplyParameters|null $replyParameters
     *        Description of the message to reply to 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove a reply keyboard or to force a reply from the user 
     *
     * @return mixed
     */
    public function sendVenue(
        $chatId,
        float $latitude,
        float $longitude,
        string $title,
        string $address,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        string $foursquareId = null,
        string $foursquareType = null,
        string $googlePlaceId = null,
        string $googlePlaceType = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $allowPaidBroadcast = null,
        string $messageEffectId = null,
        Type\ReplyParameters $replyParameters = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'title' => $title,
            'address' => $address,
            'foursquare_id' => $foursquareId,
            'foursquare_type' => $foursquareType,
            'google_place_id' => $googlePlaceId,
            'google_place_type' => $googlePlaceType,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'allow_paid_broadcast' => $allowPaidBroadcast,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters,
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
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message will be sent 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
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
     * @param bool|null $protectContent
     *        Protects the contents of the sent message from forwarding and saving 
     *
     * @param bool|null $allowPaidBroadcast
     *        Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars 
     * per message. The relevant Stars will be withdrawn from the bot's balance 
     *
     * @param string|null $messageEffectId
     *        Unique identifier of the message effect to be added to the message; for private chats only 
     *
     * @param Type\ReplyParameters|null $replyParameters
     *        Description of the message to reply to 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove a reply keyboard or to force a reply from the user 
     *
     * @return mixed
     */
    public function sendContact(
        $chatId,
        string $phoneNumber,
        string $firstName,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        string $lastName = null,
        string $vcard = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $allowPaidBroadcast = null,
        string $messageEffectId = null,
        Type\ReplyParameters $replyParameters = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'phone_number' => $phoneNumber,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'vcard' => $vcard,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'allow_paid_broadcast' => $allowPaidBroadcast,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters,
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
     * @param string $question
     *        Poll question, 1-300 characters 
     *
     * @param Type\InputPollOption[] $options
     *        A JSON-serialized list of 2-10 answer options 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message will be sent 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
     *
     * @param string|null $questionParseMode
     *        Mode for parsing entities in the question. See formatting options for more details. Currently, only custom 
     * emoji entities are allowed 
     *
     * @param Type\MessageEntity[]|null $questionEntities
     *        A JSON-serialized list of special entities that appear in the poll question. It can be specified instead of 
     * question_parse_mode 
     *
     * @param bool|null $isAnonymous
     *        True, if the poll needs to be anonymous, defaults to True 
     *
     * @param string|null $type
     *        Poll type, “quiz” or “regular”, defaults to “regular” 
     *
     * @param bool|null $allowsMultipleAnswers
     *        True, if the poll allows multiple answers, ignored for polls in quiz mode, defaults to False 
     *
     * @param int|null $correctOptionId
     *        0-based identifier of the correct answer option, required for polls in quiz mode 
     *
     * @param string|null $explanation
     *        Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 
     * characters with at most 2 line feeds after entities parsing 
     *
     * @param string|null $explanationParseMode
     *        Mode for parsing entities in the explanation. See formatting options for more details. 
     *
     * @param Type\MessageEntity[]|null $explanationEntities
     *        A JSON-serialized list of special entities that appear in the poll explanation. It can be specified instead of 
     * explanation_parse_mode 
     *
     * @param int|null $openPeriod
     *        Amount of time in seconds the poll will be active after creation, 5-600. Can't be used together with close_date. 
     *
     * @param int|null $closeDate
     *        Point in time (Unix timestamp) when the poll will be automatically closed. Must be at least 5 and no more than 600 
     * seconds in the future. Can't be used together with open_period. 
     *
     * @param bool|null $isClosed
     *        Pass True if the poll needs to be immediately closed. This can be useful for poll preview. 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $protectContent
     *        Protects the contents of the sent message from forwarding and saving 
     *
     * @param bool|null $allowPaidBroadcast
     *        Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars 
     * per message. The relevant Stars will be withdrawn from the bot's balance 
     *
     * @param string|null $messageEffectId
     *        Unique identifier of the message effect to be added to the message; for private chats only 
     *
     * @param Type\ReplyParameters|null $replyParameters
     *        Description of the message to reply to 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove a reply keyboard or to force a reply from the user 
     *
     * @return mixed
     */
    public function sendPoll(
        $chatId,
        string $question,
        array $options,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        string $questionParseMode = null,
        array $questionEntities = null,
        bool $isAnonymous = null,
        string $type = null,
        bool $allowsMultipleAnswers = null,
        int $correctOptionId = null,
        string $explanation = null,
        string $explanationParseMode = null,
        array $explanationEntities = null,
        int $openPeriod = null,
        int $closeDate = null,
        bool $isClosed = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $allowPaidBroadcast = null,
        string $messageEffectId = null,
        Type\ReplyParameters $replyParameters = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'question' => $question,
            'question_parse_mode' => $questionParseMode,
            'question_entities' => $questionEntities,
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
            'protect_content' => $protectContent,
            'allow_paid_broadcast' => $allowPaidBroadcast,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters,
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
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message will be sent 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
     *
     * @param string|null $emoji
     *        Emoji on which the dice throw animation is based. Currently, must be one of “”, “”, “”, “”, 
     * “”, or “”. Dice can have values 1-6 for “”, “” and “”, values 1-5 for “” and “”, and values 
     * 1-64 for “”. Defaults to “” 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $protectContent
     *        Protects the contents of the sent message from forwarding 
     *
     * @param bool|null $allowPaidBroadcast
     *        Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars 
     * per message. The relevant Stars will be withdrawn from the bot's balance 
     *
     * @param string|null $messageEffectId
     *        Unique identifier of the message effect to be added to the message; for private chats only 
     *
     * @param Type\ReplyParameters|null $replyParameters
     *        Description of the message to reply to 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove a reply keyboard or to force a reply from the user 
     *
     * @return mixed
     */
    public function sendDice(
        $chatId,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        string $emoji = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $allowPaidBroadcast = null,
        string $messageEffectId = null,
        Type\ReplyParameters $replyParameters = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'emoji' => $emoji,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'allow_paid_broadcast' => $allowPaidBroadcast,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters,
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
     * notes, upload_document for general files, choose_sticker for stickers, find_location for location data, 
     * record_video_note or upload_video_note for video notes. 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the action will be sent 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread; for supergroups only 
     *
     * @return mixed
     */
    public function sendChatAction(
        $chatId,
        string $action,
        string $businessConnectionId = null,
        int $messageThreadId = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'action' => $action,
        ];

        return $this->_apiCall('sendChatAction', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setmessagereaction
     *
     * Use this method to change the chosen reactions on a message. Service messages can't be reacted to. Automatically 
     * forwarded messages from a channel to its discussion group have the same available reactions as messages in the channel. Bots 
     * can't use paid reactions. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param int $messageId
     *        Identifier of the target message. If the message belongs to a media group, the reaction is set to the first 
     * non-deleted message in the group instead. 
     *
     * @param Type\AbstractReactionType[]|null $reaction
     *        A JSON-serialized list of reaction types to set on the message. Currently, as non-premium users, bots can set up 
     * to one reaction per message. A custom emoji reaction can be used if it is either already present on the message or 
     * explicitly allowed by chat administrators. Paid reactions can't be used by bots. 
     *
     * @param bool|null $isBig
     *        Pass True to set the reaction with a big animation 
     *
     * @return mixed
     */
    public function setMessageReaction(
        $chatId,
        int $messageId,
        array $reaction = null,
        bool $isBig = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'reaction' => $reaction,
            'is_big' => $isBig,
        ];

        return $this->_apiCall('setMessageReaction', $requestParameters);
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
     * https://core.telegram.org/bots/api#setuseremojistatus
     *
     * Changes the emoji status for a given user that previously allowed the bot to manage their emoji status via the Mini App 
     * method requestEmojiStatusAccess. Returns True on 
     * success. 
     *
     * @param int $userId
     *        Unique identifier of the target user 
     *
     * @param string|null $emojiStatusCustomEmojiId
     *        Custom emoji identifier of the emoji status to set. Pass an empty string to remove the status. 
     *
     * @param int|null $emojiStatusExpirationDate
     *        Expiration date of the emoji status, if any 
     *
     * @return mixed
     */
    public function setUserEmojiStatus(
        int $userId,
        string $emojiStatusCustomEmojiId = null,
        int $emojiStatusExpirationDate = null
    )
    {
        $requestParameters = [
            'user_id' => $userId,
            'emoji_status_custom_emoji_id' => $emojiStatusCustomEmojiId,
            'emoji_status_expiration_date' => $emojiStatusExpirationDate,
        ];

        return $this->_apiCall('setUserEmojiStatus', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getfile
     *
     * Use this method to get basic information about a file and prepare it for downloading. For the moment, bots can 
     * download files of up to 20MB in size. On success, a File object is returned. The file can then be 
     * downloaded via the link https://api.telegram.org/file/bot&lt;token&gt;/&lt;file_path&gt;, where 
     * &lt;file_path&gt; is taken from the response. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new 
     * one can be requested by calling getFile again. 
     *
     * @param string $fileId
     *        File identifier to get information about 
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
     * https://core.telegram.org/bots/api#banchatmember
     *
     * Use this method to ban a user in a group, a supergroup or a channel. In the case of supergroups and channels, the user 
     * will not be able to return to the chat on their own using invite links, etc., unless unbanned first. The bot must be an administrator in the chat for this to work and must have the appropriate administrator 
     * rights. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target group or username of the target supergroup or channel (in the format 
     * @|channelusername) 
     *
     * @param int $userId
     *        Unique identifier of the target user 
     *
     * @param int|null $untilDate
     *        Date when the user will be unbanned; Unix time. If user is banned for more than 366 days or less than 30 seconds from 
     * the current time they are considered to be banned forever. Applied for supergroups and channels only. 
     *
     * @param bool|null $revokeMessages
     *        Pass True to delete all messages from the chat for the user that is being removed. If False, the user will be able to 
     * see messages in the group that were sent before the user was removed. Always True for supergroups and channels. 
     *
     * @return mixed
     */
    public function banChatMember(
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

        return $this->_apiCall('banChatMember', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#unbanchatmember
     *
     * Use this method to unban a previously banned user in a supergroup or channel. The user will not 
     * return to the group or channel automatically, but will be able to join via link, etc. The bot must be an administrator for this 
     * to work. By default, this method guarantees that after the call the user is not a member of the chat, but will be able to 
     * join it. So if the user is a member of the chat they will also be removed from the chat. If you don't want 
     * this, use the parameter only_if_banned. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target group or username of the target supergroup or channel (in the format 
     * @|channelusername) 
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
     * and must have the appropriate administrator rights. Pass True for all permissions to lift restrictions from 
     * a user. Returns True on success. 
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
     * @param bool|null $useIndependentChatPermissions
     *        Pass True if chat permissions are set independently. Otherwise, the can_send_other_messages and 
     * can_add_web_page_previews permissions will imply the can_send_messages, can_send_audios, can_send_documents, can_send_photos, 
     * can_send_videos, can_send_video_notes, and can_send_voice_notes permissions; the can_send_polls permission will imply 
     * the can_send_messages permission. 
     *
     * @param int|null $untilDate
     *        Date when restrictions will be lifted for the user; Unix time. If user is restricted for more than 366 days or less 
     * than 30 seconds from the current time, they are considered to be restricted forever 
     *
     * @return mixed
     */
    public function restrictChatMember(
        $chatId,
        int $userId,
        Type\ChatPermissions $permissions,
        bool $useIndependentChatPermissions = null,
        int $untilDate = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'permissions' => $permissions,
            'use_independent_chat_permissions' => $useIndependentChatPermissions,
            'until_date' => $untilDate,
        ];

        return $this->_apiCall('restrictChatMember', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#promotechatmember
     *
     * Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the chat for 
     * this to work and must have the appropriate administrator rights. Pass False for all boolean parameters to 
     * demote a user. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param int $userId
     *        Unique identifier of the target user 
     *
     * @param bool|null $isAnonymous
     *        Pass True if the administrator's presence in the chat is hidden 
     *
     * @param bool|null $canManageChat
     *        Pass True if the administrator can access the chat event log, get boost list, see hidden supergroup and channel 
     * members, report spam messages and ignore slow mode. Implied by any other administrator privilege. 
     *
     * @param bool|null $canDeleteMessages
     *        Pass True if the administrator can delete messages of other users 
     *
     * @param bool|null $canManageVideoChats
     *        Pass True if the administrator can manage video chats 
     *
     * @param bool|null $canRestrictMembers
     *        Pass True if the administrator can restrict, ban or unban chat members, or access supergroup statistics 
     *
     * @param bool|null $canPromoteMembers
     *        Pass True if the administrator can add new administrators with a subset of their own privileges or demote 
     * administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed by him) 
     *
     * @param bool|null $canChangeInfo
     *        Pass True if the administrator can change chat title, photo and other settings 
     *
     * @param bool|null $canInviteUsers
     *        Pass True if the administrator can invite new users to the chat 
     *
     * @param bool|null $canPostStories
     *        Pass True if the administrator can post stories to the chat 
     *
     * @param bool|null $canEditStories
     *        Pass True if the administrator can edit stories posted by other users, post stories to the chat page, pin chat 
     * stories, and access the chat's story archive 
     *
     * @param bool|null $canDeleteStories
     *        Pass True if the administrator can delete stories posted by other users 
     *
     * @param bool|null $canPostMessages
     *        Pass True if the administrator can post messages in the channel, or access channel statistics; for channels 
     * only 
     *
     * @param bool|null $canEditMessages
     *        Pass True if the administrator can edit messages of other users and can pin messages; for channels only 
     *
     * @param bool|null $canPinMessages
     *        Pass True if the administrator can pin messages; for supergroups only 
     *
     * @param bool|null $canManageTopics
     *        Pass True if the user is allowed to create, rename, close, and reopen forum topics; for supergroups only 
     *
     * @return mixed
     */
    public function promoteChatMember(
        $chatId,
        int $userId,
        bool $isAnonymous = null,
        bool $canManageChat = null,
        bool $canDeleteMessages = null,
        bool $canManageVideoChats = null,
        bool $canRestrictMembers = null,
        bool $canPromoteMembers = null,
        bool $canChangeInfo = null,
        bool $canInviteUsers = null,
        bool $canPostStories = null,
        bool $canEditStories = null,
        bool $canDeleteStories = null,
        bool $canPostMessages = null,
        bool $canEditMessages = null,
        bool $canPinMessages = null,
        bool $canManageTopics = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'user_id' => $userId,
            'is_anonymous' => $isAnonymous,
            'can_manage_chat' => $canManageChat,
            'can_delete_messages' => $canDeleteMessages,
            'can_manage_video_chats' => $canManageVideoChats,
            'can_restrict_members' => $canRestrictMembers,
            'can_promote_members' => $canPromoteMembers,
            'can_change_info' => $canChangeInfo,
            'can_invite_users' => $canInviteUsers,
            'can_post_stories' => $canPostStories,
            'can_edit_stories' => $canEditStories,
            'can_delete_stories' => $canDeleteStories,
            'can_post_messages' => $canPostMessages,
            'can_edit_messages' => $canEditMessages,
            'can_pin_messages' => $canPinMessages,
            'can_manage_topics' => $canManageTopics,
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
     * https://core.telegram.org/bots/api#banchatsenderchat
     *
     * Use this method to ban a channel chat in a supergroup or a channel. Until the chat is unbanned, the owner of the banned chat won't be able to send messages on behalf of any of their channels. The 
     * bot must be an administrator in the supergroup or channel for this to work and must have the appropriate administrator 
     * rights. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param int $senderChatId
     *        Unique identifier of the target sender chat 
     *
     * @return mixed
     */
    public function banChatSenderChat(
        $chatId,
        int $senderChatId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'sender_chat_id' => $senderChatId,
        ];

        return $this->_apiCall('banChatSenderChat', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#unbanchatsenderchat
     *
     * Use this method to unban a previously banned channel chat in a supergroup or channel. The bot must be an administrator 
     * for this to work and must have the appropriate administrator rights. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param int $senderChatId
     *        Unique identifier of the target sender chat 
     *
     * @return mixed
     */
    public function unbanChatSenderChat(
        $chatId,
        int $senderChatId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'sender_chat_id' => $senderChatId,
        ];

        return $this->_apiCall('unbanChatSenderChat', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setchatpermissions
     *
     * Use this method to set default chat permissions for all members. The bot must be an administrator in the group or a 
     * supergroup for this to work and must have the can_restrict_members administrator rights. Returns True on 
     * success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup (in the format 
     * @|supergroupusername) 
     *
     * @param Type\ChatPermissions $permissions
     *        A JSON-serialized object for new default chat permissions 
     *
     * @param bool|null $useIndependentChatPermissions
     *        Pass True if chat permissions are set independently. Otherwise, the can_send_other_messages and 
     * can_add_web_page_previews permissions will imply the can_send_messages, can_send_audios, can_send_documents, can_send_photos, 
     * can_send_videos, can_send_video_notes, and can_send_voice_notes permissions; the can_send_polls permission will imply 
     * the can_send_messages permission. 
     *
     * @return mixed
     */
    public function setChatPermissions(
        $chatId,
        Type\ChatPermissions $permissions,
        bool $useIndependentChatPermissions = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'permissions' => $permissions,
            'use_independent_chat_permissions' => $useIndependentChatPermissions,
        ];

        return $this->_apiCall('setChatPermissions', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#exportchatinvitelink
     *
     * Use this method to generate a new primary invite link for a chat; any previously generated primary link is revoked. 
     * The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns 
     * the new invite link as String on success. 
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
     * work and must have the appropriate administrator rights. The link can be revoked using the method revokeChatInviteLink. Returns the new invite link as ChatInviteLink object. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param string|null $name
     *        Invite link name; 0-32 characters 
     *
     * @param int|null $expireDate
     *        Point in time (Unix timestamp) when the link will expire 
     *
     * @param int|null $memberLimit
     *        The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite 
     * link; 1-99999 
     *
     * @param bool|null $createsJoinRequest
     *        True, if users joining the chat via the link need to be approved by chat administrators. If True, member_limit 
     * can't be specified 
     *
     * @return mixed
     */
    public function createChatInviteLink(
        $chatId,
        string $name = null,
        int $expireDate = null,
        int $memberLimit = null,
        bool $createsJoinRequest = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'name' => $name,
            'expire_date' => $expireDate,
            'member_limit' => $memberLimit,
            'creates_join_request' => $createsJoinRequest,
        ];

        return $this->_apiCall('createChatInviteLink', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#editchatinvitelink
     *
     * Use this method to edit a non-primary invite link created by the bot. The bot must be an administrator in the chat for 
     * this to work and must have the appropriate administrator rights. Returns the edited invite link as a ChatInviteLink object. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param string $inviteLink
     *        The invite link to edit 
     *
     * @param string|null $name
     *        Invite link name; 0-32 characters 
     *
     * @param int|null $expireDate
     *        Point in time (Unix timestamp) when the link will expire 
     *
     * @param int|null $memberLimit
     *        The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite 
     * link; 1-99999 
     *
     * @param bool|null $createsJoinRequest
     *        True, if users joining the chat via the link need to be approved by chat administrators. If True, member_limit 
     * can't be specified 
     *
     * @return mixed
     */
    public function editChatInviteLink(
        $chatId,
        string $inviteLink,
        string $name = null,
        int $expireDate = null,
        int $memberLimit = null,
        bool $createsJoinRequest = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'invite_link' => $inviteLink,
            'name' => $name,
            'expire_date' => $expireDate,
            'member_limit' => $memberLimit,
            'creates_join_request' => $createsJoinRequest,
        ];

        return $this->_apiCall('editChatInviteLink', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#createchatsubscriptioninvitelink
     *
     * Use this method to create a subscription invite link for a channel chat. The bot must have the can_invite_users administrator rights. The 
     * link can be edited using the method editChatSubscriptionInviteLink or revoked using the method revokeChatInviteLink. Returns the new invite 
     * link as a ChatInviteLink object. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target channel chat or username of the target channel (in the format 
     * @|channelusername) 
     *
     * @param int $subscriptionPeriod
     *        The number of seconds the subscription will be active for before the next payment. Currently, it must always be 
     * 2592000 (30 days). 
     *
     * @param int $subscriptionPrice
     *        The amount of Telegram Stars a user must pay initially and after each subsequent subscription period to be a 
     * member of the chat; 1-2500 
     *
     * @param string|null $name
     *        Invite link name; 0-32 characters 
     *
     * @return mixed
     */
    public function createChatSubscriptionInviteLink(
        $chatId,
        int $subscriptionPeriod,
        int $subscriptionPrice,
        string $name = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'name' => $name,
            'subscription_period' => $subscriptionPeriod,
            'subscription_price' => $subscriptionPrice,
        ];

        return $this->_apiCall('createChatSubscriptionInviteLink', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#editchatsubscriptioninvitelink
     *
     * Use this method to edit a subscription invite link created by the bot. The bot must have the 
     * can_invite_users administrator rights. Returns the edited invite link as a ChatInviteLink 
     * object. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param string $inviteLink
     *        The invite link to edit 
     *
     * @param string|null $name
     *        Invite link name; 0-32 characters 
     *
     * @return mixed
     */
    public function editChatSubscriptionInviteLink(
        $chatId,
        string $inviteLink,
        string $name = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'invite_link' => $inviteLink,
            'name' => $name,
        ];

        return $this->_apiCall('editChatSubscriptionInviteLink', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#revokechatinvitelink
     *
     * Use this method to revoke an invite link created by the bot. If the primary link is revoked, a new link is automatically 
     * generated. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. 
     * Returns the revoked invite link as ChatInviteLink object. 
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
     * https://core.telegram.org/bots/api#approvechatjoinrequest
     *
     * Use this method to approve a chat join request. The bot must be an administrator in the chat for this to work and must 
     * have the can_invite_users administrator right. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param int $userId
     *        Unique identifier of the target user 
     *
     * @return mixed
     */
    public function approveChatJoinRequest(
        $chatId,
        int $userId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'user_id' => $userId,
        ];

        return $this->_apiCall('approveChatJoinRequest', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#declinechatjoinrequest
     *
     * Use this method to decline a chat join request. The bot must be an administrator in the chat for this to work and must 
     * have the can_invite_users administrator right. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param int $userId
     *        Unique identifier of the target user 
     *
     * @return mixed
     */
    public function declineChatJoinRequest(
        $chatId,
        int $userId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'user_id' => $userId,
        ];

        return $this->_apiCall('declineChatJoinRequest', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setchatphoto
     *
     * Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot must be an 
     * administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success. 
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
     * the chat for this to work and must have the appropriate administrator rights. Returns True on success. 
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
     * administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param string $title
     *        New chat title, 1-128 characters 
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
     * chat for this to work and must have the appropriate administrator rights. Returns True on success. 
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
     * an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup 
     * or 'can_edit_messages' administrator right in a channel. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param int $messageId
     *        Identifier of a message to pin 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message will be pinned 
     *
     * @param bool|null $disableNotification
     *        Pass True if it is not necessary to send a notification to all chat members about the new pinned message. 
     * Notifications are always disabled in channels and private chats. 
     *
     * @return mixed
     */
    public function pinChatMessage(
        $chatId,
        int $messageId,
        string $businessConnectionId = null,
        bool $disableNotification = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
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
     * must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a 
     * supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message will be unpinned 
     *
     * @param int|null $messageId
     *        Identifier of the message to unpin. Required if business_connection_id is specified. If not specified, the 
     * most recent pinned message (by sending date) will be unpinned. 
     *
     * @return mixed
     */
    public function unpinChatMessage(
        $chatId,
        string $businessConnectionId = null,
        int $messageId = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_id' => $messageId,
        ];

        return $this->_apiCall('unpinChatMessage', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#unpinallchatmessages
     *
     * Use this method to clear the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an 
     * administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 
     * 'can_edit_messages' administrator right in a channel. Returns True on success. 
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
     * Use this method to get up-to-date information about the chat. Returns a ChatFullInfo object on success. 
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
     * Use this method to get a list of administrators in a chat, which aren't bots. Returns an Array of ChatMember objects. 
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
     * https://core.telegram.org/bots/api#getchatmembercount
     *
     * Use this method to get the number of members in a chat. Returns Int on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup or channel (in the format 
     * @|channelusername) 
     *
     * @return mixed
     */
    public function getChatMemberCount(
        $chatId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
        ];

        return $this->_apiCall('getChatMemberCount', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getchatmember
     *
     * Use this method to get information about a member of a chat. The method is only guaranteed to work for other users if the 
     * bot is an administrator in the chat. Returns a ChatMember object on success. 
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
     * work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally 
     * returned in getChat requests to check if the bot can use this method. Returns True on 
     * success. 
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
     * work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally 
     * returned in getChat requests to check if the bot can use this method. Returns True on 
     * success. 
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
     * https://core.telegram.org/bots/api#getforumtopiciconstickers
     *
     * Use this method to get custom emoji stickers, which can be used as a forum topic icon by any user. Requires no 
     * parameters. Returns an Array of Sticker objects. 
     *
     * @return mixed
     */
    public function getForumTopicIconStickers(
    )
    {
        $requestParameters = [
        ];

        return $this->_apiCall('getForumTopicIconStickers', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#createforumtopic
     *
     * Use this method to create a topic in a forum supergroup chat. The bot must be an administrator in the chat for this to 
     * work and must have the can_manage_topics administrator rights. Returns information about the created topic 
     * as a ForumTopic object. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup (in the format 
     * @|supergroupusername) 
     *
     * @param string $name
     *        Topic name, 1-128 characters 
     *
     * @param int|null $iconColor
     *        Color of the topic icon in RGB format. Currently, must be one of 7322096 (0x6FB9F0), 16766590 (0xFFD67E), 
     * 13338331 (0xCB86DB), 9367192 (0x8EEE98), 16749490 (0xFF93B2), or 16478047 (0xFB6F5F) 
     *
     * @param string|null $iconCustomEmojiId
     *        Unique identifier of the custom emoji shown as the topic icon. Use getForumTopicIconStickers to get all 
     * allowed custom emoji identifiers. 
     *
     * @return mixed
     */
    public function createForumTopic(
        $chatId,
        string $name,
        int $iconColor = null,
        string $iconCustomEmojiId = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'name' => $name,
            'icon_color' => $iconColor,
            'icon_custom_emoji_id' => $iconCustomEmojiId,
        ];

        return $this->_apiCall('createForumTopic', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#editforumtopic
     *
     * Use this method to edit name and icon of a topic in a forum supergroup chat. The bot must be an administrator in the chat 
     * for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the 
     * topic. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup (in the format 
     * @|supergroupusername) 
     *
     * @param int $messageThreadId
     *        Unique identifier for the target message thread of the forum topic 
     *
     * @param string|null $name
     *        New topic name, 0-128 characters. If not specified or empty, the current name of the topic will be kept 
     *
     * @param string|null $iconCustomEmojiId
     *        New unique identifier of the custom emoji shown as the topic icon. Use getForumTopicIconStickers to get all 
     * allowed custom emoji identifiers. Pass an empty string to remove the icon. If not specified, the current icon will be 
     * kept 
     *
     * @return mixed
     */
    public function editForumTopic(
        $chatId,
        int $messageThreadId,
        string $name = null,
        string $iconCustomEmojiId = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'name' => $name,
            'icon_custom_emoji_id' => $iconCustomEmojiId,
        ];

        return $this->_apiCall('editForumTopic', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#closeforumtopic
     *
     * Use this method to close an open topic in a forum supergroup chat. The bot must be an administrator in the chat for this 
     * to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. 
     * Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup (in the format 
     * @|supergroupusername) 
     *
     * @param int $messageThreadId
     *        Unique identifier for the target message thread of the forum topic 
     *
     * @return mixed
     */
    public function closeForumTopic(
        $chatId,
        int $messageThreadId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
        ];

        return $this->_apiCall('closeForumTopic', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#reopenforumtopic
     *
     * Use this method to reopen a closed topic in a forum supergroup chat. The bot must be an administrator in the chat for 
     * this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. 
     * Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup (in the format 
     * @|supergroupusername) 
     *
     * @param int $messageThreadId
     *        Unique identifier for the target message thread of the forum topic 
     *
     * @return mixed
     */
    public function reopenForumTopic(
        $chatId,
        int $messageThreadId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
        ];

        return $this->_apiCall('reopenForumTopic', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#deleteforumtopic
     *
     * Use this method to delete a forum topic along with all its messages in a forum supergroup chat. The bot must be an 
     * administrator in the chat for this to work and must have the can_delete_messages administrator rights. Returns 
     * True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup (in the format 
     * @|supergroupusername) 
     *
     * @param int $messageThreadId
     *        Unique identifier for the target message thread of the forum topic 
     *
     * @return mixed
     */
    public function deleteForumTopic(
        $chatId,
        int $messageThreadId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
        ];

        return $this->_apiCall('deleteForumTopic', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#unpinallforumtopicmessages
     *
     * Use this method to clear the list of pinned messages in a forum topic. The bot must be an administrator in the chat for 
     * this to work and must have the can_pin_messages administrator right in the supergroup. Returns 
     * True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup (in the format 
     * @|supergroupusername) 
     *
     * @param int $messageThreadId
     *        Unique identifier for the target message thread of the forum topic 
     *
     * @return mixed
     */
    public function unpinAllForumTopicMessages(
        $chatId,
        int $messageThreadId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
        ];

        return $this->_apiCall('unpinAllForumTopicMessages', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#editgeneralforumtopic
     *
     * Use this method to edit the name of the 'General' topic in a forum supergroup chat. The bot must be an administrator in 
     * the chat for this to work and must have the can_manage_topics administrator rights. Returns True 
     * on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup (in the format 
     * @|supergroupusername) 
     *
     * @param string $name
     *        New topic name, 1-128 characters 
     *
     * @return mixed
     */
    public function editGeneralForumTopic(
        $chatId,
        string $name
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'name' => $name,
        ];

        return $this->_apiCall('editGeneralForumTopic', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#closegeneralforumtopic
     *
     * Use this method to close an open 'General' topic in a forum supergroup chat. The bot must be an administrator in the 
     * chat for this to work and must have the can_manage_topics administrator rights. Returns True on 
     * success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup (in the format 
     * @|supergroupusername) 
     *
     * @return mixed
     */
    public function closeGeneralForumTopic(
        $chatId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
        ];

        return $this->_apiCall('closeGeneralForumTopic', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#reopengeneralforumtopic
     *
     * Use this method to reopen a closed 'General' topic in a forum supergroup chat. The bot must be an administrator in the 
     * chat for this to work and must have the can_manage_topics administrator rights. The topic will be 
     * automatically unhidden if it was hidden. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup (in the format 
     * @|supergroupusername) 
     *
     * @return mixed
     */
    public function reopenGeneralForumTopic(
        $chatId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
        ];

        return $this->_apiCall('reopenGeneralForumTopic', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#hidegeneralforumtopic
     *
     * Use this method to hide the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for 
     * this to work and must have the can_manage_topics administrator rights. The topic will be automatically 
     * closed if it was open. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup (in the format 
     * @|supergroupusername) 
     *
     * @return mixed
     */
    public function hideGeneralForumTopic(
        $chatId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
        ];

        return $this->_apiCall('hideGeneralForumTopic', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#unhidegeneralforumtopic
     *
     * Use this method to unhide the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat 
     * for this to work and must have the can_manage_topics administrator rights. Returns True on 
     * success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup (in the format 
     * @|supergroupusername) 
     *
     * @return mixed
     */
    public function unhideGeneralForumTopic(
        $chatId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
        ];

        return $this->_apiCall('unhideGeneralForumTopic', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#unpinallgeneralforumtopicmessages
     *
     * Use this method to clear the list of pinned messages in a General forum topic. The bot must be an administrator in the 
     * chat for this to work and must have the can_pin_messages administrator right in the supergroup. Returns 
     * True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target supergroup (in the format 
     * @|supergroupusername) 
     *
     * @return mixed
     */
    public function unpinAllGeneralForumTopicMessages(
        $chatId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
        ];

        return $this->_apiCall('unpinAllGeneralForumTopicMessages', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#answercallbackquery
     *
     * Use this method to send answers to callback queries sent from inline 
     * keyboards. The answer will be displayed to the user as a notification at the top of the chat screen or as an alert. On success, 
     * True is returned. 
     *
     * @param string $callbackQueryId
     *        Unique identifier for the query to be answered 
     *
     * @param string|null $text
     *        Text of the notification. If not specified, nothing will be shown to the user, 0-200 characters 
     *
     * @param bool|null $showAlert
     *        If True, an alert will be shown by the client instead of a notification at the top of the chat screen. Defaults to 
     * false. 
     *
     * @param string|null $url
     *        URL that will be opened by the user's client. If you have created a Game and accepted the conditions via 
     * @|BotFather, specify the URL that opens your game - note that this will only work if the query comes from a callback_game 
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
     * https://core.telegram.org/bots/api#getuserchatboosts
     *
     * Use this method to get the list of boosts added to a chat by a user. Requires administrator rights in the chat. Returns a 
     * UserChatBoosts object. 
     *
     * @param int|string $chatId
     *        Unique identifier for the chat or username of the channel (in the format @|channelusername) 
     *
     * @param int $userId
     *        Unique identifier of the target user 
     *
     * @return mixed
     */
    public function getUserChatBoosts(
        $chatId,
        int $userId
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'user_id' => $userId,
        ];

        return $this->_apiCall('getUserChatBoosts', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getbusinessconnection
     *
     * Use this method to get information about the connection of the bot with a business account. Returns a BusinessConnection object on success. 
     *
     * @param string $businessConnectionId
     *        Unique identifier of the business connection 
     *
     * @return mixed
     */
    public function getBusinessConnection(
        string $businessConnectionId
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
        ];

        return $this->_apiCall('getBusinessConnection', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setmycommands
     *
     * Use this method to change the list of the bot's commands. See this manual 
     * for more details about bot commands. Returns True on success. 
     *
     * @param Type\BotCommand[] $commands
     *        A JSON-serialized list of bot commands to be set as the list of the bot's commands. At most 100 commands can be 
     * specified. 
     *
     * @param Type\AbstractBotCommandScope|null $scope
     *        A JSON-serialized object, describing scope of users for which the commands are relevant. Defaults to 
     * BotCommandScopeDefault. 
     *
     * @param string|null $languageCode
     *        A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from the given scope, for 
     * whose language there are no dedicated commands 
     *
     * @return mixed
     */
    public function setMyCommands(
        array $commands,
        Type\AbstractBotCommandScope $scope = null,
        string $languageCode = null
    )
    {
        $requestParameters = [
            'commands' => $commands,
            'scope' => $scope,
            'language_code' => $languageCode,
        ];

        return $this->_apiCall('setMyCommands', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#deletemycommands
     *
     * Use this method to delete the list of the bot's commands for the given scope and user language. After deletion, higher level commands will be shown to affected users. Returns True on success. 
     *
     * @param Type\AbstractBotCommandScope|null $scope
     *        A JSON-serialized object, describing scope of users for which the commands are relevant. Defaults to 
     * BotCommandScopeDefault. 
     *
     * @param string|null $languageCode
     *        A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from the given scope, for 
     * whose language there are no dedicated commands 
     *
     * @return mixed
     */
    public function deleteMyCommands(
        Type\AbstractBotCommandScope $scope = null,
        string $languageCode = null
    )
    {
        $requestParameters = [
            'scope' => $scope,
            'language_code' => $languageCode,
        ];

        return $this->_apiCall('deleteMyCommands', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getmycommands
     *
     * Use this method to get the current list of the bot's commands for the given scope and user language. Returns an Array of 
     * BotCommand objects. If commands aren't set, an empty list is returned. 
     *
     * @param Type\AbstractBotCommandScope|null $scope
     *        A JSON-serialized object, describing scope of users. Defaults to BotCommandScopeDefault. 
     *
     * @param string|null $languageCode
     *        A two-letter ISO 639-1 language code or an empty string 
     *
     * @return mixed
     */
    public function getMyCommands(
        Type\AbstractBotCommandScope $scope = null,
        string $languageCode = null
    )
    {
        $requestParameters = [
            'scope' => $scope,
            'language_code' => $languageCode,
        ];

        return $this->_apiCall('getMyCommands', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setmyname
     *
     * Use this method to change the bot's name. Returns True on success. 
     *
     * @param string|null $name
     *        New bot name; 0-64 characters. Pass an empty string to remove the dedicated name for the given language. 
     *
     * @param string|null $languageCode
     *        A two-letter ISO 639-1 language code. If empty, the name will be shown to all users for whose language there is no 
     * dedicated name. 
     *
     * @return mixed
     */
    public function setMyName(
        string $name = null,
        string $languageCode = null
    )
    {
        $requestParameters = [
            'name' => $name,
            'language_code' => $languageCode,
        ];

        return $this->_apiCall('setMyName', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getmyname
     *
     * Use this method to get the current bot name for the given user language. Returns BotName on 
     * success. 
     *
     * @param string|null $languageCode
     *        A two-letter ISO 639-1 language code or an empty string 
     *
     * @return mixed
     */
    public function getMyName(
        string $languageCode = null
    )
    {
        $requestParameters = [
            'language_code' => $languageCode,
        ];

        return $this->_apiCall('getMyName', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setmydescription
     *
     * Use this method to change the bot's description, which is shown in the chat with the bot if the chat is empty. Returns 
     * True on success. 
     *
     * @param string|null $description
     *        New bot description; 0-512 characters. Pass an empty string to remove the dedicated description for the given 
     * language. 
     *
     * @param string|null $languageCode
     *        A two-letter ISO 639-1 language code. If empty, the description will be applied to all users for whose language 
     * there is no dedicated description. 
     *
     * @return mixed
     */
    public function setMyDescription(
        string $description = null,
        string $languageCode = null
    )
    {
        $requestParameters = [
            'description' => $description,
            'language_code' => $languageCode,
        ];

        return $this->_apiCall('setMyDescription', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getmydescription
     *
     * Use this method to get the current bot description for the given user language. Returns BotDescription on success. 
     *
     * @param string|null $languageCode
     *        A two-letter ISO 639-1 language code or an empty string 
     *
     * @return mixed
     */
    public function getMyDescription(
        string $languageCode = null
    )
    {
        $requestParameters = [
            'language_code' => $languageCode,
        ];

        return $this->_apiCall('getMyDescription', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setmyshortdescription
     *
     * Use this method to change the bot's short description, which is shown on the bot's profile page and is sent together 
     * with the link when users share the bot. Returns True on success. 
     *
     * @param string|null $shortDescription
     *        New short description for the bot; 0-120 characters. Pass an empty string to remove the dedicated short 
     * description for the given language. 
     *
     * @param string|null $languageCode
     *        A two-letter ISO 639-1 language code. If empty, the short description will be applied to all users for whose 
     * language there is no dedicated short description. 
     *
     * @return mixed
     */
    public function setMyShortDescription(
        string $shortDescription = null,
        string $languageCode = null
    )
    {
        $requestParameters = [
            'short_description' => $shortDescription,
            'language_code' => $languageCode,
        ];

        return $this->_apiCall('setMyShortDescription', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getmyshortdescription
     *
     * Use this method to get the current bot short description for the given user language. Returns BotShortDescription on success. 
     *
     * @param string|null $languageCode
     *        A two-letter ISO 639-1 language code or an empty string 
     *
     * @return mixed
     */
    public function getMyShortDescription(
        string $languageCode = null
    )
    {
        $requestParameters = [
            'language_code' => $languageCode,
        ];

        return $this->_apiCall('getMyShortDescription', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setchatmenubutton
     *
     * Use this method to change the bot's menu button in a private chat, or the default menu button. Returns True 
     * on success. 
     *
     * @param int|null $chatId
     *        Unique identifier for the target private chat. If not specified, default bot's menu button will be changed 
     *
     * @param Type\AbstractMenuButton|null $menuButton
     *        A JSON-serialized object for the bot's new menu button. Defaults to MenuButtonDefault 
     *
     * @return mixed
     */
    public function setChatMenuButton(
        int $chatId = null,
        Type\AbstractMenuButton $menuButton = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'menu_button' => $menuButton,
        ];

        return $this->_apiCall('setChatMenuButton', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getchatmenubutton
     *
     * Use this method to get the current value of the bot's menu button in a private chat, or the default menu button. Returns 
     * MenuButton on success. 
     *
     * @param int|null $chatId
     *        Unique identifier for the target private chat. If not specified, default bot's menu button will be returned 
     *
     * @return mixed
     */
    public function getChatMenuButton(
        int $chatId = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
        ];

        return $this->_apiCall('getChatMenuButton', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setmydefaultadministratorrights
     *
     * Use this method to change the default administrator rights requested by the bot when it's added as an administrator 
     * to groups or channels. These rights will be suggested to users, but they are free to modify the list before adding the 
     * bot. Returns True on success. 
     *
     * @param Type\ChatAdministratorRights|null $rights
     *        A JSON-serialized object describing new default administrator rights. If not specified, the default 
     * administrator rights will be cleared. 
     *
     * @param bool|null $forChannels
     *        Pass True to change the default administrator rights of the bot in channels. Otherwise, the default 
     * administrator rights of the bot for groups and supergroups will be changed. 
     *
     * @return mixed
     */
    public function setMyDefaultAdministratorRights(
        Type\ChatAdministratorRights $rights = null,
        bool $forChannels = null
    )
    {
        $requestParameters = [
            'rights' => $rights,
            'for_channels' => $forChannels,
        ];

        return $this->_apiCall('setMyDefaultAdministratorRights', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getmydefaultadministratorrights
     *
     * Use this method to get the current default administrator rights of the bot. Returns ChatAdministratorRights on success. 
     *
     * @param bool|null $forChannels
     *        Pass True to get default administrator rights of the bot in channels. Otherwise, default administrator rights 
     * of the bot for groups and supergroups will be returned. 
     *
     * @return mixed
     */
    public function getMyDefaultAdministratorRights(
        bool $forChannels = null
    )
    {
        $requestParameters = [
            'for_channels' => $forChannels,
        ];

        return $this->_apiCall('getMyDefaultAdministratorRights', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#editmessagetext
     *
     * Use this method to edit text and game messages. On success, if the edited message is not an 
     * inline message, the edited Message is returned, otherwise True is returned. Note that 
     * business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 
     * hours from the time they were sent. 
     *
     * @param string $text
     *        New text of the message, 1-4096 characters after entities parsing 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message to be edited was sent 
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
     *        A JSON-serialized list of special entities that appear in message text, which can be specified instead of 
     * parse_mode 
     *
     * @param Type\LinkPreviewOptions|null $linkPreviewOptions
     *        Link preview generation options for the message 
     *
     * @param Type\InlineKeyboardMarkup|null $replyMarkup
     *        A JSON-serialized object for an inline keyboard. 
     *
     * @return mixed
     */
    public function editMessageText(
        string $text,
        string $businessConnectionId = null,
        $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
        string $parseMode = null,
        array $entities = null,
        Type\LinkPreviewOptions $linkPreviewOptions = null,
        Type\InlineKeyboardMarkup $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'text' => $text,
            'parse_mode' => $parseMode,
            'entities' => $entities,
            'link_preview_options' => $linkPreviewOptions,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('editMessageText', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#editmessagecaption
     *
     * Use this method to edit captions of messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do 
     * not contain an inline keyboard can only be edited within 48 hours from the time they were sent. 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message to be edited was sent 
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
     *        A JSON-serialized list of special entities that appear in the caption, which can be specified instead of 
     * parse_mode 
     *
     * @param bool|null $showCaptionAboveMedia
     *        Pass True, if the caption must be shown above the message media. Supported only for animation, photo and video 
     * messages. 
     *
     * @param Type\InlineKeyboardMarkup|null $replyMarkup
     *        A JSON-serialized object for an inline keyboard. 
     *
     * @return mixed
     */
    public function editMessageCaption(
        string $businessConnectionId = null,
        $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        bool $showCaptionAboveMedia = null,
        Type\InlineKeyboardMarkup $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'caption' => $caption,
            'parse_mode' => $parseMode,
            'caption_entities' => $captionEntities,
            'show_caption_above_media' => $showCaptionAboveMedia,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('editMessageCaption', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#editmessagemedia
     *
     * Use this method to edit animation, audio, document, photo, or video messages, or to add media to text messages. If a 
     * message is part of a message album, then it can be edited only to an audio for audio albums, only to a document for document 
     * albums and to a photo or a video otherwise. When an inline message is edited, a new file can't be uploaded; use a previously 
     * uploaded file via its file_id or specify a URL. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do 
     * not contain an inline keyboard can only be edited within 48 hours from the time they were sent. 
     *
     * @param Type\AbstractInputMedia $media
     *        A JSON-serialized object for a new media content of the message 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message to be edited was sent 
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
        string $businessConnectionId = null,
        $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
        Type\InlineKeyboardMarkup $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'media' => $media,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('editMessageMedia', $requestParameters);
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
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message to be edited was sent 
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
     * @param int|null $livePeriod
     *        New period in seconds during which the location can be updated, starting from the message send date. If 
     * 0x7FFFFFFF is specified, then the location can be updated forever. Otherwise, the new value must not exceed the current 
     * live_period by more than a day, and the live location expiration date must remain within the next 90 days. If not specified, 
     * then live_period remains unchanged 
     *
     * @param float|null $horizontalAccuracy
     *        The radius of uncertainty for the location, measured in meters; 0-1500 
     *
     * @param int|null $heading
     *        Direction in which the user is moving, in degrees. Must be between 1 and 360 if specified. 
     *
     * @param int|null $proximityAlertRadius
     *        The maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 
     * and 100000 if specified. 
     *
     * @param Type\InlineKeyboardMarkup|null $replyMarkup
     *        A JSON-serialized object for a new inline keyboard. 
     *
     * @return mixed
     */
    public function editMessageLiveLocation(
        float $latitude,
        float $longitude,
        string $businessConnectionId = null,
        $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
        int $livePeriod = null,
        float $horizontalAccuracy = null,
        int $heading = null,
        int $proximityAlertRadius = null,
        Type\InlineKeyboardMarkup $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'live_period' => $livePeriod,
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
     * message is not an inline message, the edited Message is returned, otherwise True is 
     * returned. 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message to be edited was sent 
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
        string $businessConnectionId = null,
        $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
        Type\InlineKeyboardMarkup $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('stopMessageLiveLocation', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#editmessagereplymarkup
     *
     * Use this method to edit only the reply markup of messages. On success, if the edited message is not an inline message, 
     * the edited Message is returned, otherwise True is returned. Note that business 
     * messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 
     * hours from the time they were sent. 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message to be edited was sent 
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
        string $businessConnectionId = null,
        $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
        Type\InlineKeyboardMarkup $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
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
     * Use this method to stop a poll which was sent by the bot. On success, the stopped Poll is 
     * returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param int $messageId
     *        Identifier of the original message with the poll 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message to be edited was sent 
     *
     * @param Type\InlineKeyboardMarkup|null $replyMarkup
     *        A JSON-serialized object for a new message inline keyboard. 
     *
     * @return mixed
     */
    public function stopPoll(
        $chatId,
        int $messageId,
        string $businessConnectionId = null,
        Type\InlineKeyboardMarkup $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
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
     * can only be deleted if it was sent less than 48 hours ago.- Service messages about a supergroup, channel, or forum 
     * topic creation can't be deleted.- A dice message in a private chat can only be deleted if it was sent more than 24 hours 
     * ago.- Bots can delete outgoing messages in private chats, groups, and supergroups.- Bots can delete incoming 
     * messages in private chats.- Bots granted can_post_messages permissions can delete outgoing messages in 
     * channels.- If the bot is an administrator of a group, it can delete any message there.- If the bot has 
     * can_delete_messages permission in a supergroup or a channel, it can delete any message there.Returns True on success. 
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
     * https://core.telegram.org/bots/api#deletemessages
     *
     * Use this method to delete multiple messages simultaneously. If some of the specified messages can't be found, they 
     * are skipped. Returns True on success. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param int[] $messageIds
     *        A JSON-serialized list of 1-100 identifiers of messages to delete. See deleteMessage for limitations on which 
     * messages can be deleted 
     *
     * @return mixed
     */
    public function deleteMessages(
        $chatId,
        array $messageIds
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_ids' => $messageIds,
        ];

        return $this->_apiCall('deleteMessages', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendsticker
     *
     * Use this method to send static .WEBP, animated 
     * .TGS, or video .WEBM stickers. On 
     * success, the sent Message is returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param Type\InputFile|string $sticker
     *        Sticker to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass 
     * an HTTP URL as a String for Telegram to get a .WEBP sticker from the Internet, or upload a new .WEBP, .TGS, or .WEBM 
     * sticker using multipart/form-data. More information on Sending Files ». Video and animated stickers can't be sent 
     * via an HTTP URL. 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message will be sent 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
     *
     * @param string|null $emoji
     *        Emoji associated with the sticker; only for just uploaded stickers 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $protectContent
     *        Protects the contents of the sent message from forwarding and saving 
     *
     * @param bool|null $allowPaidBroadcast
     *        Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars 
     * per message. The relevant Stars will be withdrawn from the bot's balance 
     *
     * @param string|null $messageEffectId
     *        Unique identifier of the message effect to be added to the message; for private chats only 
     *
     * @param Type\ReplyParameters|null $replyParameters
     *        Description of the message to reply to 
     *
     * @param Type\InlineKeyboardMarkup|Type\ReplyKeyboardMarkup|Type\ReplyKeyboardRemove|Type\ForceReply|null $replyMarkup
     *        Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, 
     * instructions to remove a reply keyboard or to force a reply from the user 
     *
     * @return mixed
     */
    public function sendSticker(
        $chatId,
        $sticker,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        string $emoji = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $allowPaidBroadcast = null,
        string $messageEffectId = null,
        Type\ReplyParameters $replyParameters = null,
        $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'sticker' => $sticker,
            'emoji' => $emoji,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'allow_paid_broadcast' => $allowPaidBroadcast,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters,
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
     * https://core.telegram.org/bots/api#getcustomemojistickers
     *
     * Use this method to get information about custom emoji stickers by their identifiers. Returns an Array of Sticker objects. 
     *
     * @param string[] $customEmojiIds
     *        A JSON-serialized list of custom emoji identifiers. At most 200 custom emoji identifiers can be specified. 
     *
     * @return mixed
     */
    public function getCustomEmojiStickers(
        array $customEmojiIds
    )
    {
        $requestParameters = [
            'custom_emoji_ids' => $customEmojiIds,
        ];

        return $this->_apiCall('getCustomEmojiStickers', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#uploadstickerfile
     *
     * Use this method to upload a file with a sticker for later use in the createNewStickerSet, addStickerToSet, or replaceStickerInSet methods (the file can be used multiple times). Returns the uploaded File on success. 
     *
     * @param int $userId
     *        User identifier of sticker file owner 
     *
     * @param Type\InputFile $sticker
     *        A file with the sticker in .WEBP, .PNG, .TGS, or .WEBM format. See https://core.telegram.org/stickers for 
     * technical requirements. More information on Sending Files » 
     *
     * @param string $stickerFormat
     *        Format of the sticker, must be one of “static”, “animated”, “video” 
     *
     * @return mixed
     */
    public function uploadStickerFile(
        int $userId,
        Type\InputFile $sticker,
        string $stickerFormat
    )
    {
        $requestParameters = [
            'user_id' => $userId,
            'sticker' => $sticker,
            'sticker_format' => $stickerFormat,
        ];

        return $this->_apiCall('uploadStickerFile', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#createnewstickerset
     *
     * Use this method to create a new sticker set owned by a user. The bot will be able to edit the sticker set thus created. 
     * Returns True on success. 
     *
     * @param int $userId
     *        User identifier of created sticker set owner 
     *
     * @param string $name
     *        Short name of sticker set, to be used in t.me/addstickers/ URLs (e.g., animals). Can contain only English 
     * letters, digits and underscores. Must begin with a letter, can't contain consecutive underscores and must end in 
     * "_by_<bot_username>". <bot_username> is case insensitive. 1-64 characters. 
     *
     * @param string $title
     *        Sticker set title, 1-64 characters 
     *
     * @param Type\InputSticker[] $stickers
     *        A JSON-serialized list of 1-50 initial stickers to be added to the sticker set 
     *
     * @param string|null $stickerType
     *        Type of stickers in the set, pass “regular”, “mask”, or “custom_emoji”. By default, a regular 
     * sticker set is created. 
     *
     * @param bool|null $needsRepainting
     *        Pass True if stickers in the sticker set must be repainted to the color of text when used in messages, the accent 
     * color if used as emoji status, white on chat photos, or another appropriate color based on context; for custom emoji 
     * sticker sets only 
     *
     * @return mixed
     */
    public function createNewStickerSet(
        int $userId,
        string $name,
        string $title,
        array $stickers,
        string $stickerType = null,
        bool $needsRepainting = null
    )
    {
        $requestParameters = [
            'user_id' => $userId,
            'name' => $name,
            'title' => $title,
            'stickers' => $stickers,
            'sticker_type' => $stickerType,
            'needs_repainting' => $needsRepainting,
        ];

        return $this->_apiCall('createNewStickerSet', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#addstickertoset
     *
     * Use this method to add a new sticker to a set created by the bot. Emoji sticker sets can have up to 200 stickers. Other 
     * sticker sets can have up to 120 stickers. Returns True on success. 
     *
     * @param int $userId
     *        User identifier of sticker set owner 
     *
     * @param string $name
     *        Sticker set name 
     *
     * @param Type\InputSticker $sticker
     *        A JSON-serialized object with information about the added sticker. If exactly the same sticker had already 
     * been added to the set, then the set isn't changed. 
     *
     * @return mixed
     */
    public function addStickerToSet(
        int $userId,
        string $name,
        Type\InputSticker $sticker
    )
    {
        $requestParameters = [
            'user_id' => $userId,
            'name' => $name,
            'sticker' => $sticker,
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
     * https://core.telegram.org/bots/api#replacestickerinset
     *
     * Use this method to replace an existing sticker in a sticker set with a new one. The method is equivalent to calling deleteStickerFromSet, then addStickerToSet, then setStickerPositionInSet. Returns True on success. 
     *
     * @param int $userId
     *        User identifier of the sticker set owner 
     *
     * @param string $name
     *        Sticker set name 
     *
     * @param string $oldSticker
     *        File identifier of the replaced sticker 
     *
     * @param Type\InputSticker $sticker
     *        A JSON-serialized object with information about the added sticker. If exactly the same sticker had already 
     * been added to the set, then the set remains unchanged. 
     *
     * @return mixed
     */
    public function replaceStickerInSet(
        int $userId,
        string $name,
        string $oldSticker,
        Type\InputSticker $sticker
    )
    {
        $requestParameters = [
            'user_id' => $userId,
            'name' => $name,
            'old_sticker' => $oldSticker,
            'sticker' => $sticker,
        ];

        return $this->_apiCall('replaceStickerInSet', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setstickeremojilist
     *
     * Use this method to change the list of emoji assigned to a regular or custom emoji sticker. The sticker must belong to a 
     * sticker set created by the bot. Returns True on success. 
     *
     * @param string $sticker
     *        File identifier of the sticker 
     *
     * @param string[] $emojiList
     *        A JSON-serialized list of 1-20 emoji associated with the sticker 
     *
     * @return mixed
     */
    public function setStickerEmojiList(
        string $sticker,
        array $emojiList
    )
    {
        $requestParameters = [
            'sticker' => $sticker,
            'emoji_list' => $emojiList,
        ];

        return $this->_apiCall('setStickerEmojiList', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setstickerkeywords
     *
     * Use this method to change search keywords assigned to a regular or custom emoji sticker. The sticker must belong to a 
     * sticker set created by the bot. Returns True on success. 
     *
     * @param string $sticker
     *        File identifier of the sticker 
     *
     * @param string[]|null $keywords
     *        A JSON-serialized list of 0-20 search keywords for the sticker with total length of up to 64 characters 
     *
     * @return mixed
     */
    public function setStickerKeywords(
        string $sticker,
        array $keywords = null
    )
    {
        $requestParameters = [
            'sticker' => $sticker,
            'keywords' => $keywords,
        ];

        return $this->_apiCall('setStickerKeywords', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setstickermaskposition
     *
     * Use this method to change the mask position of a mask sticker. The sticker must belong 
     * to a sticker set that was created by the bot. Returns True on success. 
     *
     * @param string $sticker
     *        File identifier of the sticker 
     *
     * @param Type\MaskPosition|null $maskPosition
     *        A JSON-serialized object with the position where the mask should be placed on faces. Omit the parameter to 
     * remove the mask position. 
     *
     * @return mixed
     */
    public function setStickerMaskPosition(
        string $sticker,
        Type\MaskPosition $maskPosition = null
    )
    {
        $requestParameters = [
            'sticker' => $sticker,
            'mask_position' => $maskPosition,
        ];

        return $this->_apiCall('setStickerMaskPosition', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setstickersettitle
     *
     * Use this method to set the title of a created sticker set. Returns True on success. 
     *
     * @param string $name
     *        Sticker set name 
     *
     * @param string $title
     *        Sticker set title, 1-64 characters 
     *
     * @return mixed
     */
    public function setStickerSetTitle(
        string $name,
        string $title
    )
    {
        $requestParameters = [
            'name' => $name,
            'title' => $title,
        ];

        return $this->_apiCall('setStickerSetTitle', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setstickersetthumbnail
     *
     * Use this method to set the thumbnail of a regular or mask sticker set. The format of the thumbnail file must match the 
     * format of the stickers in the set. Returns True on success. 
     *
     * @param string $name
     *        Sticker set name 
     *
     * @param int $userId
     *        User identifier of the sticker set owner 
     *
     * @param string $format
     *        Format of the thumbnail, must be one of “static” for a .WEBP or .PNG image, “animated” for a .TGS 
     * animation, or “video” for a WEBM video 
     *
     * @param Type\InputFile|string|null $thumbnail
     *        A .WEBP or .PNG image with the thumbnail, must be up to 128 kilobytes in size and have a width and height of exactly 
     * 100px, or a .TGS animation with a thumbnail up to 32 kilobytes in size (see 
     * https://core.telegram.org/stickers#animation-requirements for animated sticker technical requirements), or a WEBM video with the thumbnail up to 32 kilobytes in size; see 
     * https://core.telegram.org/stickers#video-requirements for video sticker technical requirements. Pass a file_id as a String to send a file that already exists on the 
     * Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using 
     * multipart/form-data. More information on Sending Files ». Animated and video sticker set thumbnails can't be uploaded via HTTP URL. 
     * If omitted, then the thumbnail is dropped and the first sticker is used as the thumbnail. 
     *
     * @return mixed
     */
    public function setStickerSetThumbnail(
        string $name,
        int $userId,
        string $format,
        $thumbnail = null
    )
    {
        $requestParameters = [
            'name' => $name,
            'user_id' => $userId,
            'thumbnail' => $thumbnail,
            'format' => $format,
        ];

        return $this->_apiCall('setStickerSetThumbnail', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setcustomemojistickersetthumbnail
     *
     * Use this method to set the thumbnail of a custom emoji sticker set. Returns True on success. 
     *
     * @param string $name
     *        Sticker set name 
     *
     * @param string|null $customEmojiId
     *        Custom emoji identifier of a sticker from the sticker set; pass an empty string to drop the thumbnail and use the 
     * first sticker as the thumbnail. 
     *
     * @return mixed
     */
    public function setCustomEmojiStickerSetThumbnail(
        string $name,
        string $customEmojiId = null
    )
    {
        $requestParameters = [
            'name' => $name,
            'custom_emoji_id' => $customEmojiId,
        ];

        return $this->_apiCall('setCustomEmojiStickerSetThumbnail', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#deletestickerset
     *
     * Use this method to delete a sticker set that was created by the bot. Returns True on success. 
     *
     * @param string $name
     *        Sticker set name 
     *
     * @return mixed
     */
    public function deleteStickerSet(
        string $name
    )
    {
        $requestParameters = [
            'name' => $name,
        ];

        return $this->_apiCall('deleteStickerSet', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#getavailablegifts
     *
     * Returns the list of gifts that can be sent by the bot to users. Requires no parameters. Returns a Gifts object. 
     *
     * @return mixed
     */
    public function getAvailableGifts(
    )
    {
        $requestParameters = [
        ];

        return $this->_apiCall('getAvailableGifts', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendgift
     *
     * Sends a gift to the given user. The gift can't be converted to Telegram Stars by the user. Returns True on 
     * success. To enable this option, send the /setinline command to @|BotFather and provide the placeholder text that the user will see in the input field after typing your bot's name. 
     *
     * @param int $userId
     *        Unique identifier of the target user that will receive the gift 
     *
     * @param string $giftId
     *        Identifier of the gift 
     *
     * @param string|null $text
     *        Text that will be shown along with the gift; 0-255 characters 
     *
     * @param string|null $textParseMode
     *        Mode for parsing entities in the text. See formatting options for more details. Entities other than 
     * “bold”, “italic”, “underline”, “strikethrough”, “spoiler”, and “custom_emoji” are 
     * ignored. 
     *
     * @param Type\MessageEntity[]|null $textEntities
     *        A JSON-serialized list of special entities that appear in the gift text. It can be specified instead of 
     * text_parse_mode. Entities other than “bold”, “italic”, “underline”, “strikethrough”, “spoiler”, and 
     * “custom_emoji” are ignored. 
     *
     * @return mixed
     */
    public function sendGift(
        int $userId,
        string $giftId,
        string $text = null,
        string $textParseMode = null,
        array $textEntities = null
    )
    {
        $requestParameters = [
            'user_id' => $userId,
            'gift_id' => $giftId,
            'text' => $text,
            'text_parse_mode' => $textParseMode,
            'text_entities' => $textEntities,
        ];

        return $this->_apiCall('sendGift', $requestParameters);
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
     *        Pass True if results may be cached on the server side only for the user that sent the query. By default, results may 
     * be returned to any user who sends the same query. 
     *
     * @param string|null $nextOffset
     *        Pass the offset that a client should send in the next query with the same text to receive more results. Pass an 
     * empty string if there are no more results or if you don't support pagination. Offset length can't exceed 64 bytes. 
     *
     * @param Type\InlineQueryResultsButton|null $button
     *        A JSON-serialized object describing a button to be shown above inline query results 
     *
     * @return mixed
     */
    public function answerInlineQuery(
        string $inlineQueryId,
        array $results,
        int $cacheTime = null,
        bool $isPersonal = null,
        string $nextOffset = null,
        Type\InlineQueryResultsButton $button = null
    )
    {
        $requestParameters = [
            'inline_query_id' => $inlineQueryId,
            'results' => $results,
            'cache_time' => $cacheTime,
            'is_personal' => $isPersonal,
            'next_offset' => $nextOffset,
            'button' => $button,
        ];

        return $this->_apiCall('answerInlineQuery', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#answerwebappquery
     *
     * Use this method to set the result of an interaction with a Web App and send a 
     * corresponding message on behalf of the user to the chat from which the query originated. On success, a SentWebAppMessage object is returned. 
     *
     * @param string $webAppQueryId
     *        Unique identifier for the query to be answered 
     *
     * @param Type\AbstractInlineQueryResult $result
     *        A JSON-serialized object describing the message to be sent 
     *
     * @return mixed
     */
    public function answerWebAppQuery(
        string $webAppQueryId,
        Type\AbstractInlineQueryResult $result
    )
    {
        $requestParameters = [
            'web_app_query_id' => $webAppQueryId,
            'result' => $result,
        ];

        return $this->_apiCall('answerWebAppQuery', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#savepreparedinlinemessage
     *
     * Stores a message that can be sent by a user of a Mini App. Returns a PreparedInlineMessage object. 
     *
     * @param int $userId
     *        Unique identifier of the target user that can use the prepared message 
     *
     * @param Type\AbstractInlineQueryResult $result
     *        A JSON-serialized object describing the message to be sent 
     *
     * @param bool|null $allowUserChats
     *        Pass True if the message can be sent to private chats with users 
     *
     * @param bool|null $allowBotChats
     *        Pass True if the message can be sent to private chats with bots 
     *
     * @param bool|null $allowGroupChats
     *        Pass True if the message can be sent to group and supergroup chats 
     *
     * @param bool|null $allowChannelChats
     *        Pass True if the message can be sent to channel chats 
     *
     * @return mixed
     */
    public function savePreparedInlineMessage(
        int $userId,
        Type\AbstractInlineQueryResult $result,
        bool $allowUserChats = null,
        bool $allowBotChats = null,
        bool $allowGroupChats = null,
        bool $allowChannelChats = null
    )
    {
        $requestParameters = [
            'user_id' => $userId,
            'result' => $result,
            'allow_user_chats' => $allowUserChats,
            'allow_bot_chats' => $allowBotChats,
            'allow_group_chats' => $allowGroupChats,
            'allow_channel_chats' => $allowChannelChats,
        ];

        return $this->_apiCall('savePreparedInlineMessage', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#sendinvoice
     *
     * Use this method to send invoices. On success, the sent Message is returned. 
     *
     * @param int|string $chatId
     *        Unique identifier for the target chat or username of the target channel (in the format @|channelusername) 
     *
     * @param string $title
     *        Product name, 1-32 characters 
     *
     * @param string $description
     *        Product description, 1-255 characters 
     *
     * @param string $payload
     *        Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use it for your internal 
     * processes. 
     *
     * @param string $currency
     *        Three-letter ISO 4217 currency code, see more on currencies. Pass “XTR” for payments in Telegram Stars. 
     *
     * @param Type\LabeledPrice[] $prices
     *        Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, 
     * delivery tax, bonus, etc.). Must contain exactly one item for payments in Telegram Stars. 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
     *
     * @param string|null $providerToken
     *        Payment provider token, obtained via @|BotFather. Pass an empty string for payments in Telegram Stars. 
     *
     * @param int|null $maxTipAmount
     *        The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For 
     * example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the 
     * number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0. Not 
     * supported for payments in Telegram Stars. 
     *
     * @param int[]|null $suggestedTipAmounts
     *        A JSON-serialized array of suggested amounts of tips in the smallest units of the currency (integer, not 
     * float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a 
     * strictly increased order and must not exceed max_tip_amount. 
     *
     * @param string|null $startParameter
     *        Unique deep-linking parameter. If left empty, forwarded copies of the sent message will have a Pay button, 
     * allowing multiple users to pay directly from the forwarded message, using the same invoice. If non-empty, forwarded 
     * copies of the sent message will have a URL button with a deep link to the bot (instead of a Pay button), with the value used 
     * as the start parameter 
     *
     * @param string|null $providerData
     *        JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed 
     * description of required fields should be provided by the payment provider. 
     *
     * @param string|null $photoUrl
     *        URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service. People like 
     * it better when they see what they are paying for. 
     *
     * @param int|null $photoSize
     *        Photo size in bytes 
     *
     * @param int|null $photoWidth
     *        Photo width 
     *
     * @param int|null $photoHeight
     *        Photo height 
     *
     * @param bool|null $needName
     *        Pass True if you require the user's full name to complete the order. Ignored for payments in Telegram Stars. 
     *
     * @param bool|null $needPhoneNumber
     *        Pass True if you require the user's phone number to complete the order. Ignored for payments in Telegram Stars. 
     *
     * @param bool|null $needEmail
     *        Pass True if you require the user's email address to complete the order. Ignored for payments in Telegram Stars. 
     *
     * @param bool|null $needShippingAddress
     *        Pass True if you require the user's shipping address to complete the order. Ignored for payments in Telegram 
     * Stars. 
     *
     * @param bool|null $sendPhoneNumberToProvider
     *        Pass True if the user's phone number should be sent to the provider. Ignored for payments in Telegram Stars. 
     *
     * @param bool|null $sendEmailToProvider
     *        Pass True if the user's email address should be sent to the provider. Ignored for payments in Telegram Stars. 
     *
     * @param bool|null $isFlexible
     *        Pass True if the final price depends on the shipping method. Ignored for payments in Telegram Stars. 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $protectContent
     *        Protects the contents of the sent message from forwarding and saving 
     *
     * @param bool|null $allowPaidBroadcast
     *        Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars 
     * per message. The relevant Stars will be withdrawn from the bot's balance 
     *
     * @param string|null $messageEffectId
     *        Unique identifier of the message effect to be added to the message; for private chats only 
     *
     * @param Type\ReplyParameters|null $replyParameters
     *        Description of the message to reply to 
     *
     * @param Type\InlineKeyboardMarkup|null $replyMarkup
     *        A JSON-serialized object for an inline keyboard. If empty, one 'Pay total price' button will be shown. If not 
     * empty, the first button must be a Pay button. 
     *
     * @return mixed
     */
    public function sendInvoice(
        $chatId,
        string $title,
        string $description,
        string $payload,
        string $currency,
        array $prices,
        int $messageThreadId = null,
        string $providerToken = null,
        int $maxTipAmount = null,
        array $suggestedTipAmounts = null,
        string $startParameter = null,
        string $providerData = null,
        string $photoUrl = null,
        int $photoSize = null,
        int $photoWidth = null,
        int $photoHeight = null,
        bool $needName = null,
        bool $needPhoneNumber = null,
        bool $needEmail = null,
        bool $needShippingAddress = null,
        bool $sendPhoneNumberToProvider = null,
        bool $sendEmailToProvider = null,
        bool $isFlexible = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $allowPaidBroadcast = null,
        string $messageEffectId = null,
        Type\ReplyParameters $replyParameters = null,
        Type\InlineKeyboardMarkup $replyMarkup = null
    )
    {
        $requestParameters = [
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
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
            'protect_content' => $protectContent,
            'allow_paid_broadcast' => $allowPaidBroadcast,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendInvoice', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#createinvoicelink
     *
     * Use this method to create a link for an invoice. Returns the created invoice link as String on success. 
     *
     * @param string $title
     *        Product name, 1-32 characters 
     *
     * @param string $description
     *        Product description, 1-255 characters 
     *
     * @param string $payload
     *        Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use it for your internal 
     * processes. 
     *
     * @param string $currency
     *        Three-letter ISO 4217 currency code, see more on currencies. Pass “XTR” for payments in Telegram Stars. 
     *
     * @param Type\LabeledPrice[] $prices
     *        Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, 
     * delivery tax, bonus, etc.). Must contain exactly one item for payments in Telegram Stars. 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the link will be created. For payments in 
     * Telegram Stars only. 
     *
     * @param string|null $providerToken
     *        Payment provider token, obtained via @|BotFather. Pass an empty string for payments in Telegram Stars. 
     *
     * @param int|null $subscriptionPeriod
     *        The number of seconds the subscription will be active for before the next payment. The currency must be set to 
     * “XTR” (Telegram Stars) if the parameter is used. Currently, it must always be 2592000 (30 days) if specified. Any 
     * number of subscriptions can be active for a given bot at the same time, including multiple concurrent subscriptions 
     * from the same user. Subscription price must no exceed 2500 Telegram Stars. 
     *
     * @param int|null $maxTipAmount
     *        The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For 
     * example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the 
     * number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0. Not 
     * supported for payments in Telegram Stars. 
     *
     * @param int[]|null $suggestedTipAmounts
     *        A JSON-serialized array of suggested amounts of tips in the smallest units of the currency (integer, not 
     * float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a 
     * strictly increased order and must not exceed max_tip_amount. 
     *
     * @param string|null $providerData
     *        JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed 
     * description of required fields should be provided by the payment provider. 
     *
     * @param string|null $photoUrl
     *        URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service. 
     *
     * @param int|null $photoSize
     *        Photo size in bytes 
     *
     * @param int|null $photoWidth
     *        Photo width 
     *
     * @param int|null $photoHeight
     *        Photo height 
     *
     * @param bool|null $needName
     *        Pass True if you require the user's full name to complete the order. Ignored for payments in Telegram Stars. 
     *
     * @param bool|null $needPhoneNumber
     *        Pass True if you require the user's phone number to complete the order. Ignored for payments in Telegram Stars. 
     *
     * @param bool|null $needEmail
     *        Pass True if you require the user's email address to complete the order. Ignored for payments in Telegram Stars. 
     *
     * @param bool|null $needShippingAddress
     *        Pass True if you require the user's shipping address to complete the order. Ignored for payments in Telegram 
     * Stars. 
     *
     * @param bool|null $sendPhoneNumberToProvider
     *        Pass True if the user's phone number should be sent to the provider. Ignored for payments in Telegram Stars. 
     *
     * @param bool|null $sendEmailToProvider
     *        Pass True if the user's email address should be sent to the provider. Ignored for payments in Telegram Stars. 
     *
     * @param bool|null $isFlexible
     *        Pass True if the final price depends on the shipping method. Ignored for payments in Telegram Stars. 
     *
     * @return mixed
     */
    public function createInvoiceLink(
        string $title,
        string $description,
        string $payload,
        string $currency,
        array $prices,
        string $businessConnectionId = null,
        string $providerToken = null,
        int $subscriptionPeriod = null,
        int $maxTipAmount = null,
        array $suggestedTipAmounts = null,
        string $providerData = null,
        string $photoUrl = null,
        int $photoSize = null,
        int $photoWidth = null,
        int $photoHeight = null,
        bool $needName = null,
        bool $needPhoneNumber = null,
        bool $needEmail = null,
        bool $needShippingAddress = null,
        bool $sendPhoneNumberToProvider = null,
        bool $sendEmailToProvider = null,
        bool $isFlexible = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'title' => $title,
            'description' => $description,
            'payload' => $payload,
            'provider_token' => $providerToken,
            'currency' => $currency,
            'prices' => $prices,
            'subscription_period' => $subscriptionPeriod,
            'max_tip_amount' => $maxTipAmount,
            'suggested_tip_amounts' => $suggestedTipAmounts,
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
        ];

        return $this->_apiCall('createInvoiceLink', $requestParameters);
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
     *        Pass True if delivery to the specified address is possible and False if there are any problems (for example, if 
     * delivery to the specified address is not possible) 
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
     * pre-checkout queries. On success, True is returned. Note: The Bot API must receive an answer within 
     * 10 seconds after the pre-checkout query was sent. 
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
     * https://core.telegram.org/bots/api#getstartransactions
     *
     * Returns the bot's Telegram Star transactions in chronological order. On success, returns a StarTransactions object. 
     *
     * @param int|null $offset
     *        Number of transactions to skip in the response 
     *
     * @param int|null $limit
     *        The maximum number of transactions to be retrieved. Values between 1-100 are accepted. Defaults to 100. 
     *
     * @return mixed
     */
    public function getStarTransactions(
        int $offset = null,
        int $limit = null
    )
    {
        $requestParameters = [
            'offset' => $offset,
            'limit' => $limit,
        ];

        return $this->_apiCall('getStarTransactions', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#refundstarpayment
     *
     * Refunds a successful payment in Telegram Stars. Returns True 
     * on success. 
     *
     * @param int $userId
     *        Identifier of the user whose payment will be refunded 
     *
     * @param string $telegramPaymentChargeId
     *        Telegram payment identifier 
     *
     * @return mixed
     */
    public function refundStarPayment(
        int $userId,
        string $telegramPaymentChargeId
    )
    {
        $requestParameters = [
            'user_id' => $userId,
            'telegram_payment_charge_id' => $telegramPaymentChargeId,
        ];

        return $this->_apiCall('refundStarPayment', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#edituserstarsubscription
     *
     * Allows the bot to cancel or re-enable extension of a subscription paid in Telegram Stars. Returns True on 
     * success. 
     *
     * @param int $userId
     *        Identifier of the user whose subscription will be edited 
     *
     * @param string $telegramPaymentChargeId
     *        Telegram payment identifier for the subscription 
     *
     * @param bool $isCanceled
     *        Pass True to cancel extension of the user subscription; the subscription must be active up to the end of the 
     * current subscription period. Pass False to allow the user to re-enable a subscription that was previously canceled by 
     * the bot. 
     *
     * @return mixed
     */
    public function editUserStarSubscription(
        int $userId,
        string $telegramPaymentChargeId,
        bool $isCanceled
    )
    {
        $requestParameters = [
            'user_id' => $userId,
            'telegram_payment_charge_id' => $telegramPaymentChargeId,
            'is_canceled' => $isCanceled,
        ];

        return $this->_apiCall('editUserStarSubscription', $requestParameters);
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
     *        Short name of the game, serves as the unique identifier for the game. Set up your games via @|BotFather. 
     *
     * @param string|null $businessConnectionId
     *        Unique identifier of the business connection on behalf of which the message will be sent 
     *
     * @param int|null $messageThreadId
     *        Unique identifier for the target message thread (topic) of the forum; for forum supergroups only 
     *
     * @param bool|null $disableNotification
     *        Sends the message silently. Users will receive a notification with no sound. 
     *
     * @param bool|null $protectContent
     *        Protects the contents of the sent message from forwarding and saving 
     *
     * @param bool|null $allowPaidBroadcast
     *        Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars 
     * per message. The relevant Stars will be withdrawn from the bot's balance 
     *
     * @param string|null $messageEffectId
     *        Unique identifier of the message effect to be added to the message; for private chats only 
     *
     * @param Type\ReplyParameters|null $replyParameters
     *        Description of the message to reply to 
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
        string $businessConnectionId = null,
        int $messageThreadId = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $allowPaidBroadcast = null,
        string $messageEffectId = null,
        Type\ReplyParameters $replyParameters = null,
        Type\InlineKeyboardMarkup $replyMarkup = null
    )
    {
        $requestParameters = [
            'business_connection_id' => $businessConnectionId,
            'chat_id' => $chatId,
            'message_thread_id' => $messageThreadId,
            'game_short_name' => $gameShortName,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
            'allow_paid_broadcast' => $allowPaidBroadcast,
            'message_effect_id' => $messageEffectId,
            'reply_parameters' => $replyParameters,
            'reply_markup' => $replyMarkup,
        ];

        return $this->_apiCall('sendGame', $requestParameters);
    }

    /**
     * https://core.telegram.org/bots/api#setgamescore
     *
     * Use this method to set the score of the specified user in a game message. On success, if the message is not an inline 
     * message, the Message is returned, otherwise True is returned. Returns an error, if the 
     * new score is not greater than the user's current score in the chat and force is False. 
     *
     * @param int $userId
     *        User identifier 
     *
     * @param int $score
     *        New score, must be non-negative 
     *
     * @param bool|null $force
     *        Pass True if the high score is allowed to decrease. This can be useful when fixing mistakes or banning cheaters 
     *
     * @param bool|null $disableEditMessage
     *        Pass True if the game message should not be automatically edited to include the current scoreboard 
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
     * neighbors in a game. Returns an Array of GameHighScore objects. 
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