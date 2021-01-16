import boto3

def add_faces_to_collection(bucket, photo, collection_id):
    
    client=boto3.client('rekognition')

    response=client.index_faces(CollectionId=collection_id,
                                Image={'S3Object':{'Bucket':bucket,'Name':photo}},
                                ExternalImageId=photo,
                                MaxFaces=1,
                                QualityFilter="AUTO",
                                DetectionAttributes=['ALL'])

    print ('Results for ' + photo) 	
    print('Faces indexed:')						
    for faceRecord in response['FaceRecords']:
         print('  Face ID: ' + faceRecord['Face']['FaceId'])
         print('  Location: {}'.format(faceRecord['Face']['BoundingBox']))

def main(event,context):
    bucket = 'missingchildren'
    collection_id='MissingChildrenCollection'
    
    s3 = boto3.resource(service_name='s3')
    bucketeek = s3.Bucket(bucket)

    
    for obj in bucketeek.objects.all():
        photo = obj.key
        indexed_faces_count=add_faces_to_collection(bucket, photo, collection_id)
        print("Faces indexed count: " + str(indexed_faces_count))


if __name__ == "__main__":
    main()
