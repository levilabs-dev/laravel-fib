# Security Policy

**[Levi Labs](https://levilabs.dev)** · [GitHub](https://github.com/levilabs-dev)  
Maintained by **Nizam Omer** — [nizaamomer.com](https://nizaamomer.com) · [nizam@nizaamomer.com](mailto:nizam@nizaamomer.com)

This package handles FIB OAuth client credentials (`client_id`, `client_secret`) and processes real financial transactions (payments, payouts, and refunds). Please report security issues responsibly, as described below.

## Supported Versions

This package follows [Semantic Versioning](https://semver.org/). Security fixes are applied to the latest tagged release and to `main`; older major versions are not backported.

| Version          | Supported |
| ---------------- | --------- |
| 1.x (and `main`) | Yes       |
| < 1.0            | No        |

## Reporting a Vulnerability

**Please do not open a public GitHub issue for security vulnerabilities.**

### Preferred: GitHub private reporting

1. Open the [Security tab](https://github.com/levilabs-dev/laravel-fib/security) for this repository.
2. Click **Report a vulnerability**.
3. Describe the issue, including steps to reproduce and potential impact.

### Alternative: email

Contact us privately (include repo name `levilabs/laravel-fib` in the subject):

| | |
| --- | --- |
| **Levi Labs** | [hello@levilabs.dev](mailto:hello@levilabs.dev) |
| **Nizam Omer** | [nizam@nizaamomer.com](mailto:nizam@nizaamomer.com) |

### What to expect

- **Acknowledgement:** within 48 hours of your report
- **Initial assessment:** within 5 business days, including whether the report is accepted and its severity
- **Updates:** you'll be kept informed of progress until the issue is resolved
- **Disclosure:** once a fix is released, we'll credit you in the release notes/changelog unless you prefer to remain anonymous

## Scope

**In scope:**

- The SDK code in this repository (`src/`) — request construction, response handling, credential handling, webhook/callback handling patterns, event/listener persistence
- Anything that could lead to credential exposure, incorrect payment/payout/refund amounts, or trusting an unverified callback payload

**Out of scope:**

- Vulnerabilities in FIB's own API or infrastructure (report those directly to FIB)
- Issues that require an attacker to already have your `.env` / FIB client credentials

Thank you for helping keep this package and its users secure.
