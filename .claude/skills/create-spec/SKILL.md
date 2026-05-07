# Create Spec

## Instructions

Create a technical specification document for a proposed change to this PHP SDK.

### Steps

1. Understand the user's request and ask clarifying questions if needed
2. Analyze the current state of relevant source files, entities, and interfaces
3. Write the spec using this structure:
   - **Objective**: What the change accomplishes
   - **Current State**: How the relevant code works today (with file paths and line references)
   - **Proposed Changes**: File modifications, new classes, interface changes, entity structures
   - **Backward Compatibility**: Impact on consumers (MercadoPago plugins)
   - **Testing**: Test classes and mock strategy (using `RequesterInterface`)
   - **Migration**: Steps for consumers (if breaking — implies major version bump)
4. Present the spec to the user for review before any implementation
