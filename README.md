# Telegram Types

Representaion of [telegram bot types](https://core.telegram.org/bots/api#available-types) in php classes. Generated by [madmagestelegram/TypesGenerator](https://github.com/madmagestelegram/TypesGenerator).

# Install
`composer require madmagestelegram/types`

# Usage

Simplest usage is getting and setting data
```php
$message = new Message();
$message->setText('Hello world!');

echo $message->getText(); // "Hello world!"
// as assoc array
print_r($message->_getRawData());// ['text' => 'Hello world!']
```

more fields
```php
$message = ( new Message() )
        ->setMessageId(1)
        ->setDate(time())
        ->setChat(( new Chat() )->setId(1)->setType('channel'))
        ->setText('Hello world!')
        ->setAudio(
            ( new Audio() )
                ->setFileId("1")
                ->setDuration(60)
                ->setTitle('Some title')
                ->setThumb(( new PhotoSize() )
                    ->setFileId("1")
                    ->setHeight(100)
                    ->setWidth(100)
                )
        )->setLocation(
            ( new Location() )
                ->setLatitude(60.60)
                ->setLongitude(60.60)
        );

    print_r($message->_getRawData());
    
/*
    
Array
(
    [message_id] => 1
    [date] => 1570945477
    [chat] => Array
        (
            [id] => 1
            [type] => channel
        )

    [text] => Hello world!
    [audio] => Array
        (
            [file_id] => 1
            [duration] => 60
            [title] => Some title
            [thumb] => Array
                (
                    [file_id] => 1
                    [width] => 100
                    [height] => 100
                )

        )

    [location] => Array
        (
            [longitude] => 60.6
            [latitude] => 60.6
        )

)
*/

```
