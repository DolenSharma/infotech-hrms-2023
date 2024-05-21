<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Post;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
    protected ?string $maxContentWidth = 'full';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
{
    return 'Post Created Successfully!!';
}

protected function storeRecord(array $validatedData)
{
    $post = Post::create($validatedData);

    PostResource::updatePostStatus($post);

    return redirect()->route('filament.resource.posts.index');
}

}
