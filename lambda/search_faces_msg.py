import boto3
import datetime
import urllib
from botocore.vendored import requests

def main(event,context):

    bucket='sea-bucket'
    collectionId='MissingChildrenCollection'
    
    
    threshold = 70
    maxFaces=2

    client=boto3.client('rekognition')
    
    fileName=event['Records'][0]['s3']['object']['key']
    
    response=client.search_faces_by_image(CollectionId=collectionId,
                                Image={'S3Object':{'Bucket':bucket,'Name':fileName}},
                                FaceMatchThreshold=threshold,
                                MaxFaces=maxFaces)

                                
    faceMatches=response['FaceMatches']
    print ('Matching faces')
    for match in faceMatches:
            print ('FaceId:' + match['Face']['FaceId'])
            print ('FaceId:' + match['Face']['ExternalImageId'])
            print ('Similarity: ' + "{:.2f}".format(match['Similarity']) + "%")
            s1 = match['Face']['ExternalImageId']
            s1 = s1.split('-')[0]
            externalid = int(s1)        
            msg = "Positive match identified with {:.3f}% similarity to ".format(match['Similarity']) 
    
    r = requests.get('https://www.namus.gov/api/CaseSets/NamUs/MissingPersons/Cases/{}'.format(externalid))
    personinfo = r.json()
    fullname = ' '.join('{} {} {}'.format(
        personinfo["subjectIdentification"]["firstName"], 
        personinfo["subjectIdentification"].get("middleName",""), 
        personinfo["subjectIdentification"]["lastName"]).split())
    if personinfo["subjectIdentification"]["currentMinAge"] == personinfo["subjectIdentification"]["currentMaxAge"]:
        age = personinfo["subjectIdentification"]["currentMinAge"]
        
    else:
        age = '{}-{}'.format(personinfo["subjectIdentification"]["currentMinAge"],
            personinfo["subjectIdentification"]["currentMaxAge"])
    lastseen = datetime.datetime.strptime(personinfo["sighting"]["date"], '%Y-%m-%d').strftime('%m/%d/%Y')
    sex = personinfo["subjectDescription"]["sex"]["name"]
    msg += 'missing person {}: {}. {}, age {}. Last seen on {}.'.format(externalid, fullname, sex, age, lastseen)
    
    
    message = {'Subject': {'Data': "MPI Result"},'Body': {'Html': {'Data': msg}}}
    ses = boto3.client("ses")
    
    
    
    destination = fileName.split('/')[1]
    destination = destination.split('-')[0]
    destination = destination.replace('*', '@')
    print(destination)
    # Publish a simple message to the specified SNS topic
    response = ses.send_email(
        Source = "dhvanineer01@gmail.com",
        Destination = {"ToAddresses": [destination]},
        Message = message
    )

    return msg     
        
