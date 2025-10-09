name: Bug Report
description: Report a bug encountered while using Pro Poule
labels: ["bug"]

body:
  - type: markdown
    attributes:
      value: |
        Welcome to Pro Poule issue tracker! Before creating an issue, please heed the following:

1. This tracker should only be used to report bugs and request features / enhancements to Pro Poule
    - For questions and general support, checkout the user manual
    - For documentation issues, propose edit on docs site directly.
2. When making a bug report, make sure you provide all required information. The easier it is for maintainers to reproduce, the faster it'll be fixed.
3. If you think you know what the reason for the bug is, share it with us. Maybe put in a PR 😉

  - type: textarea
    id: bug-info
    attributes:
      label: Information about bug
      description: Also tell us, what did you expect to happen?
      placeholder: Please provide as much information as possible.
    validations:
      required: true

  - type: dropdown
    id: module
    attributes:
      label: Module
      description: Select affected area of Pro Poule.
      multiple: true
      options:
        - Gamers
        - Tournaments
        - Clubs and Community
        - other
    validations:
      required: true

  - type: textarea
    id: exact-version
    attributes:
      label: Version
      description: Share version number you are using.
    validations:
      required: true

  - type: textarea
    id: logs
    attributes:
      label: Relevant log output / Stack trace / Full Error Message.
      description: Please copy and paste any relevant log output. This will be automatically formatted.
      render: shell

  - type: markdown
    attributes:
      value: |
        By submitting this issue, you agree to follow our [Code of Conduct]()
