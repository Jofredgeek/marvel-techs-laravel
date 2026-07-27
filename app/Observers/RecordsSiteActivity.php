<?php

namespace App\Observers;

use App\Models\Contact;
use App\Models\Post;
use App\Models\Project;
use App\Models\Quote;
use App\Models\Service;
use App\Models\User;
use App\Services\ActivityLogger;
use Illuminate\Database\Eloquent\Model;

class RecordsSiteActivity
{
    public function __construct(private readonly ActivityLogger $logger) {}

    public function created(Model $model): void
    {
        [$category, $description] = $this->describe($model, 'created');

        $this->logger->record(
            strtolower(class_basename($model)).'_created',
            $category,
            $description,
            $model,
        );
    }

    public function updated(Model $model): void
    {
        $changes = array_values(array_diff(
            array_keys($model->getChanges()),
            ['updated_at', 'last_login_at', 'last_seen_at', 'remember_token']
        ));

        if ($changes === []) {
            return;
        }

        [$category, $description] = $this->describe($model, 'updated');

        $this->logger->record(
            strtolower(class_basename($model)).'_updated',
            $category,
            $description,
            $model,
            ['fields' => $changes],
        );
    }

    public function deleted(Model $model): void
    {
        [$category, $description] = $this->describe($model, 'deleted');

        $this->logger->record(
            strtolower(class_basename($model)).'_deleted',
            $category,
            $description,
            null,
            ['subject_id' => $model->getKey()],
        );
    }

    /**
     * @return array{string, string}
     */
    private function describe(Model $model, string $action): array
    {
        $verbs = [
            'created' => 'créé',
            'updated' => 'mis à jour',
            'deleted' => 'supprimé',
        ];

        return match (true) {
            $model instanceof Contact => [
                'inbox',
                $action === 'created'
                    ? "Nouveau message de {$model->name}"
                    : "Message de {$model->name} {$verbs[$action]}",
            ],
            $model instanceof Quote => [
                'inbox',
                $action === 'created'
                    ? "Nouvelle demande de devis de {$model->name}"
                    : "Devis de {$model->name} {$verbs[$action]}",
            ],
            $model instanceof User => [
                'users',
                "Compte de {$model->name} {$verbs[$action]}",
            ],
            $model instanceof Post => [
                'content',
                "Article « {$model->title} » {$verbs[$action]}",
            ],
            $model instanceof Project => [
                'content',
                "Projet « {$model->title} » {$verbs[$action]}",
            ],
            $model instanceof Service => [
                'content',
                "Service « {$model->title} » {$verbs[$action]}",
            ],
            default => [
                'system',
                class_basename($model)." {$verbs[$action]}",
            ],
        };
    }
}
