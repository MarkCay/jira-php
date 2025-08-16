<?php

declare(strict_types=1);

namespace Jira\Resources;

use Jira\Enums\Transporter\Method;
use Jira\Resources\Concerns\Transportable;
use Jira\ValueObjects\Transporter\Payload;

class IssueTypes
{
    use Transportable;


    /**
     * Creates an issue type from a JSON representation and adds the issue newly created issue type to the default issue type scheme.
     *
     * @see https://docs.atlassian.com/software/jira/docs/api/REST/8.0.0/#api/2/issuetype-createIssueType
     *
     * @param  non-empty-array<array-key, mixed>  $body
     * @return non-empty-array<array-key, mixed>
     *
     * @throws \Jira\Exceptions\ErrorException
     * @throws \Jira\Exceptions\TransporterException
     * @throws \Jira\Exceptions\UnserializableResponse
     * @throws \JsonException
     */
    public function create(array $body): array
    {
        $payload = Payload::create(
            uri: 'api/2/issuetype',
            method: Method::POST,
            body: $body,
        );

        // @phpstan-ignore-next-line
        return $this->transporter->request(payload: $payload);
    }

    /**
     * Returns a full representation of the issue type that has the given id.
     *
     * @see https://docs.atlassian.com/software/jira/docs/api/REST/8.0.0/#api/2/issuetype-getIssueType
     *
     * @param  array<array-key, mixed>  $query
     * @return non-empty-array<array-key, mixed>
     *
     * @throws \Jira\Exceptions\ErrorException
     * @throws \Jira\Exceptions\TransporterException
     * @throws \Jira\Exceptions\UnserializableResponse
     * @throws \JsonException
     */
    public function get(int|string $id, array $query = []): array
    {
        $payload = Payload::create(
            uri: "api/2/issuetype/$id",
            query: $query,
        );

        // @phpstan-ignore-next-line
        return $this->transporter->request(payload: $payload);
    }

    /**
     * Returns a list of all issue types visible to the user.
     *
     * @see https://docs.atlassian.com/software/jira/docs/api/REST/8.0.0/#api/2/issuetype-getIssueTypes
     *
     * @param  array<array-key, mixed>  $query
     * @return non-empty-array<array-key, mixed>
     *
     * @throws \Jira\Exceptions\ErrorException
     * @throws \Jira\Exceptions\TransporterException
     * @throws \Jira\Exceptions\UnserializableResponse
     * @throws \JsonException
     */
    public function all(array $query = []): array
    {
        $payload = Payload::create(
            uri: 'api/2/issuetype',
            query: $query,
        );

        // @phpstan-ignore-next-line
        return $this->transporter->request(payload: $payload);
    }

    /**
     * Deletes the specified issue type. If the issue type has any associated issues, these issues will be migrated to the alternative issue type specified in the parameter. You can determine the alternative issue types by calling the /rest/api/2/issuetype/{id}/alternatives resource.
     *
     * @see https://docs.atlassian.com/software/jira/docs/api/REST/8.0.0/#api/2/issuetype-deleteIssueType
     *
     * @param  array<array-key, mixed>  $query
     *
     * @throws \Jira\Exceptions\ErrorException
     * @throws \Jira\Exceptions\TransporterException
     * @throws \Jira\Exceptions\UnserializableResponse
     * @throws \JsonException
     */
    public function delete(int|string $id, array $query = []): void
    {
        $payload = Payload::create(
            uri: "api/2/issuetype/$id",
            method: Method::DELETE,
            query: $query,
        );

        $this->transporter->request(payload: $payload);
    }

    /**
     * Updates the specified issue type from a JSON representation.
     *
     * @see https://docs.atlassian.com/software/jira/docs/api/REST/8.0.0/#api/2/issuetype-updateIssueType
     *
     * @param  non-empty-array<array-key, mixed>  $body
     * @param  array<array-key, mixed>  $query
     *
     * @throws \Jira\Exceptions\ErrorException
     * @throws \Jira\Exceptions\TransporterException
     * @throws \Jira\Exceptions\UnserializableResponse
     * @throws \JsonException
     */
    public function edit(int|string $id, array $body, array $query = []): void
    {
        $payload = Payload::create(
            uri: "api/2/issuetype/$id",
            method: Method::PUT,
            body: $body,
            query: $query,
        );

        $this->transporter->request(payload: $payload);
    }

    /**
     * Returns a list of all alternative issue types for the given issue type id.
     * 
     * @see https://docs.atlassian.com/software/jira/docs/api/REST/8.0.0/#api/2/issuetype-getAlternatives
     *
     * @param  int|string  $id
     * @return non-empty-array<array-key, mixed>
     *
     * @throws \Jira\Exceptions\ErrorException
     * @throws \Jira\Exceptions\TransporterException
     * @throws \Jira\Exceptions\UnserializableResponse
     * @throws \JsonException
     */
    public function getAlternatives(int|string $id): array
    {
        $payload = Payload::create(
            uri: "api/2/issuetype/$id/alternatives",
        );

        // @phpstan-ignore-next-line
        return $this->transporter->request(payload: $payload);
    }
}
