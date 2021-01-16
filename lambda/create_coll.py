import boto3

def create_collection(collection_id):

    client=boto3.client('rekognition')

    #Create a collection
    print('Creating collection:' + collection_id)
    response=client.create_collection(CollectionId=collection_id)
    print('Collection ARN: ' + response['CollectionArn'])
    
    
def main(event, context):
    collection_id='MissingChildrenCollection'
    create_collection(collection_id)

if __name__ == "__main__":
    main()     
